<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 year', 'now');
        $schedule_date = $date->format('Y-m-d');
        $schedule_time = $date->format('H:i:s');
        $barberId = User::barbers()->pluck('id');
        $clientId = User::clients()->pluck('id');
        $statuses = ['Atendida', 'Cancelada'];

        return [
            'barber_id' => $this->faker->randomElement($barberId),
            'client_id' => $this->faker->randomElement($clientId),
            'service_id' => $this->faker->numberBetween(1, 6),
            'location_id' => $this->faker->numberBetween(1, 3),
            'scheduled_date' => $schedule_date,
            'scheduled_time' => $schedule_time,
            'comments' => $this->faker->text(100),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
