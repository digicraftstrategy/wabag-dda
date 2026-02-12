<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateProjectDocs extends Command
{
    protected $signature = 'project:docs';

    protected $description = 'Create and auto-populate standard project documentation files';

    public function handle(): int
    {
        $docsPath = base_path('docs');

        $templates = [
            'STACK.md' => <<<MD
# 📘 Wabag District DDA
## Project Management System – Stack Summary

### Project Context
A web-based District Development Authority (DDA) Project Management & Public
Information System for Wabag District, Enga Province, Papua New Guinea.

---

## Core Stack
- Laravel Framework 10.x
- PHP 8.3
- Filament Admin Panel v3
- Livewire
- Tailwind CSS
- Vite

---

## Purpose
This document defines the official technology stack used by the system.
MD,

            'ARCHITECTURE.md' => <<<MD
# 🏗 System Architecture

## Overview
This document explains the internal architecture, system layers, and
data flow of the DDA Project Management System.

---

## Architecture Layers
- Presentation Layer (Admin & Public UI)
- Application Layer (Laravel & Filament)
- Business Logic Layer
- Data Layer (Database & Storage)

---

## Key Principles
- Separation of Admin and Public access
- Role-based security
- Scalable for multi-district use
MD,

            'ROLES.md' => <<<MD
# 👥 Roles & Permissions

## Purpose
Defines system roles and permission boundaries.

---

## Core Roles
- Super Admin
- District Admin
- Project Officer
- Content Editor
- Viewer (read-only)

---

## Governance
All write actions require authentication and authorization.
MD,

            'DEPLOYMENT.md' => <<<MD
# 🚀 Deployment & Hosting Guide

## Purpose
Provides standard steps for deploying the system to production.

---

## Server Requirements
- Linux (Ubuntu LTS)
- PHP 8.3
- MySQL / MariaDB
- Nginx or Apache
- Node.js

---

## Deployment Flow
1. Clone repository
2. Install dependencies
3. Configure environment
4. Run migrations
5. Build assets
MD,

            'MULTI_DISTRICT.md' => <<<MD
# 🌍 Multi-District Rollout Strategy

## Objective
Enable reuse of the system across multiple districts.

---

## Strategy
- Single codebase
- District-scoped data
- Configurable branding

---

## Governance
Central oversight with district-level autonomy.
MD,
        ];

        if (! File::exists($docsPath)) {
            File::makeDirectory($docsPath, 0755, true);
            $this->info('📁 docs directory created.');
        }

        foreach ($templates as $file => $content) {
            $filePath = $docsPath . DIRECTORY_SEPARATOR . $file;

            if (! File::exists($filePath)) {
                File::put($filePath, trim($content) . PHP_EOL);
                $this->info("📄 Created and populated {$file}");
            } else {
                $this->warn("⚠ {$file} already exists – skipped");
            }
        }

        $this->info('✅ Project documentation fully initialized.');

        return Command::SUCCESS;
    }
}
