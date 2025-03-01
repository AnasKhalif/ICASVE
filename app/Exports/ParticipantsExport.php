<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ParticipantsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $rolesToDisplay = [
        'indonesia-presenter',
        'foreign-presenter',
        'indonesia-participants',
        'foreign-participants'
    ];

    public function collection()
    {
        return User::whereHas('roles', function ($query) {
            $query->whereIn('name', $this->rolesToDisplay);
        })->with(['roles', 'filePayment'])->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Institution',
            'RegType',
            'Job Title',
            'Country',
            'Status Payment',
            'Attendance',
        ];
    }

    public function map($user): array
    {
        $filteredRoles = $user->roles
            ->whereIn('name', $this->rolesToDisplay)
            ->pluck('display_name')
            ->join(', ');

        return [
            $user->name,
            $user->email,
            $user->phone_number,
            $user->institution,
            $filteredRoles ?: 'N/A',
            $user->job_title,
            $user->country,
            $user->filePayment->status ?? 'Not Submitted',
            $user->attendance ?? 'Not Available',
        ];
    }
}
