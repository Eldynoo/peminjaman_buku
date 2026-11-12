<?php

namespace App\Filament\Resources\Loans\Tables;

use App\Models\Loan;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LoansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('book.title'),
                TextColumn::make('return_date')->date(),
                TextColumn::make('status')->badge()->color(fn (string $state)=> $state ==='dipinjam'?'warning':'success'),
                TextColumn::make('fine')->money('IDR'),
                    
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('dikembalikan')
                ->icon('heroicon-o-arrow-uturn-left')
                ->RequiresConfirmation()
                ->visible(fn (Loan $record)=> $record->status ==='dipinjam')
                ->action(function (Loan $record){
                    $telat = (int) $record->return_date->diffinDays(now()->startOfDay(),false);
                    $record->update([
                        'returned_at'=> now(),
                        'status'=>'dikembalikan',
                        'fine'=> max(0,$telat) * 1000,
                    ]);
                    $record->book->increment('stok');
                    Notification::make()->title('buku sudah dikembalikan')->success()->send();
                }),
            ]);
    }
}
