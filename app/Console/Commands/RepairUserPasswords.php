<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RepairUserPasswords extends Command
{
    protected $signature = 'app:repair-user-passwords {--password=12345678}';

    protected $description = 'Repair users.password so it uses bcrypt hash.';

    public function handle()
    {
        $plainPassword = (string) $this->option('password');

        $total = User::count();
        $updated = 0;

        $users = User::select(['id', 'password'])->get();

        foreach ($users as $user) {
            $stored = (string) $user->password;

            // bcrypt hashes usually start with $2y$, $2b$, $2a$
            $isBcrypt = str_starts_with($stored, '$2y$') || str_starts_with($stored, '$2b$') || str_starts_with($stored, '$2a$');

            if (! $isBcrypt) {
                $user->password = Hash::make($plainPassword);
                $user->save();
                $updated++;
            }
        }

        $this->info("Users total: {$total}");
        $this->info("Users repaired (non-bcrypt -> bcrypt): {$updated}");
        return self::SUCCESS;
    }
}

