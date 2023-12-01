<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CredentialStripe;

class CredentialStripeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CredentialStripe::create([
            'Publishable_key' => "pk_test_51OGFp7Evd2hjvArxM75oDSn54iu7E9ER0QvDq9xWSxnfLXiclKaqXIwK31U8D68fft8H7Y2vKMPmK2gnJwvNYNRn00qoZXbWV2",
            'Secret_key' =>"sk_test_51OGFp7Evd2hjvArxE2bYitZGI4UncbETPHZR4OmXzaK59U4cV4g0AJx4TCAkN423uy7wspSBq7DKDOuAygkWRnlp00qAACJiRA"
        ]);

    }
}
