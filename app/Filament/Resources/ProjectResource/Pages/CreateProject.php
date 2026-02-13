<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\ProjectType;
use Illuminate\Validation\ValidationException;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $type = ProjectType::find($data['project_type_id']);

        // Guard: invalid or tampered project type
        if (! $type) {
            throw ValidationException::withMessages([
                'project_type_id' => 'Invalid project type selected.',
            ]);
        }

        // ROAD project logic
        if ($type->code === 'ROAD') {

            // ✅ Validate LLGs
            if (empty($data['llgs'])) {
                throw ValidationException::withMessages([
                    'llgs' => 'At least one LLG must be selected for ROAD projects.',
                ]);
            }

            // ✅ Validate coordinates (THIS IS WHERE IT GOES)
            if (
                empty($data['start_coordinates']) ||
                empty($data['end_coordinates'])
            ) {
                throw ValidationException::withMessages([
                    'start_coordinates' => 'Start and end coordinates are required for ROAD projects.',
                ]);
            }

            // Use first selected LLG as primary
            $data['llg_id'] = $data['llgs'][0];

            // ROAD projects do not use a single ward
            $data['ward_id'] = null;
        }

        return $data;
    }

    /**
     * Sync pivot relationships AFTER create
     */
    protected function afterCreate(): void
    {
        $record = $this->record;
        $data   = $this->form->getState();

        // Funding sources (many-to-many)
        if (! empty($data['fundingSources'])) {
            $record->fundingSources()->sync($data['fundingSources']);
        }

        // ROAD LLG coverage
        if (! empty($data['llgs'])) {
            $record->llgs()->sync($data['llgs']);
        }

        // ROAD ward coverage
        if (! empty($data['wards'])) {
            $record->wards()->sync($data['wards']);
        }
    }
}
