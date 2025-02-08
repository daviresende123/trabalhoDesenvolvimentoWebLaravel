<?php
// database/factories/MovieFactory.php
namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'genre' => $this->faker->randomElement(['Ação', 'Comédia', 'Drama', 'Ficção']),
            'release_year' => $this->faker->year,
            'rental_price' => $this->faker->randomFloat(2, 5, 20),
            'stock' => $this->faker->numberBetween(1, 5),
            'cover_image' => 'covers/' . $this->faker->image(storage_path('app/public/covers'), 400, 600, null, false)
        ];
    }
}
