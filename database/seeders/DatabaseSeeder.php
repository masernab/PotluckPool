<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankAccount;
use App\Models\Event;
use App\Models\Member;
use App\Models\Purchase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $event = Event::factory()
            ->has(
                Member::factory()
                    ->has(
                        BankAccount::factory()->count(rand(1,3))
                    )
                    ->count(8)
            )
            ->create();

        Member::all()->each(function (Member $member) use ($event) {
            Purchase::factory()
                ->for($event)
                ->for($member)
                ->create();
        });

        /*Member::factory()
            ->for($event)
            ->has(
                Purchase::factory()->for($event)
            )
            ->has(BankAccount::factory())
            ->count(random_int(3, 10))
            ->create();*/
        /*Event::factory()
            ->has(
                Member::factory()
                    ->has(Purchase::factory())
                    ->has(BankAccount::factory())
                    ->count(random_int(3, 10))
            )
            ->create();*/
    }
}
