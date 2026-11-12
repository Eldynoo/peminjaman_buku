<?php

namespace App\Filament\Widgets; 

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('judul buku', Book::count()),
            Stat::make('anggota',User::where('role','siswa')->count()),
            Stat::make('sedang dipinjam',Loan::where('status','dipinjam')->count())
        ];
    }
}
