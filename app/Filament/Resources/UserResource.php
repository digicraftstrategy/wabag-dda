<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MultiSelect;
use Filament\Tables\Columns\{TextColumn, BadgeColumn};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

   // protected static ?string $navigationGroup = 'User Management';

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Users';
    protected static ?int $navigationSort = 8;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::$model::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning'; // Options: primary, success, warning, danger, info, etc.
    }

    public static function canAccess(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user && $user->hasRole('admin');
    }

    public static function getTableQuery(): Builder
    {
        return parent::getTableQuery()->with('roles');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('Full Name'),

            TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true)
                ->label('Email Address'),

            MultiSelect::make('roles')
                ->relationship('roles', 'name')
                ->preload()
                ->label('Roles'),

            TextInput::make('password')
                ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser)
                ->dehydrated(fn ($state) => filled($state))
                ->label('Password')
                ->password()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->sortable()
                    ->searchable()
                    ->colors([
                        'success' => 'admin',
                        'info' => 'project-officer',
                        'warning' => 'media-officer',
                    ]),
                TextColumn::make('created_at')
                    ->label('Joined')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'User Management';
    }
}
