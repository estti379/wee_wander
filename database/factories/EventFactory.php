<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->lastName();
        $descriptor = $this->hikingEventTitles[rand(0, (count($this->hikingEventTitles)-1 ))];
        $brand = $this->brands[rand(0, (count($this->brands)-1 ))];;

        //User::count();

        return [
            'title' => $name." ".$brand." ".$descriptor,
            'organizer_id' => rand(1, User::count()),
        ];
    }

    private $brands = [
        "Apple",
        "Google",
        "Microsoft",
        "Amazon",
        "Facebook",
        "Coca-Cola",
        "Walmart",
        "Samsung",
        "Toyota",
        "Nike",
        "IBM",
        "Intel",
        "Adobe",
        "Netflix",
        "Sony",
        "Uber",
        "Airbnb",
        "Tesla",
        "Visa",
        "Mastercard",
        "Acme Corporation",
        "XYZ Corp",
        "Initech",
        "Globex",
        "Wayne Enterprises",
        "Stark Industries",
        "Umbrella Corporation",
        "Oscorp",
        "Tyrell Corporation",
        "Aperture Science",
        "Cyberdyne Systems",
        "Umbrella Academy",
        "Monsters Inc.",
        "Vandelay Industries",
        "Strickland Propane",
        "Sterling Cooper",
        "Duff Beer",
        "Gekko & Co",
        "Bluth Company",
        "Pawnee Department of Parks and Recreation",
        "Los Pollos Hermanos",
        "Wernham Hogg",
        "Dunder Mifflin",
        "Paper Street Soap Company",
        "Blufr",
        "Gringotts",
        "Oceanic Airlines",
        "InGen",
        "Buy More",
        "Genco Pura Olive Oil Company",
        "Big Kahuna Burger",
        "Brawndo",
        "Strickland Propane",
        "Genco",
        "Soylent Corporation",
        "S-Mart",
        "Cyberdyne Systems",
        "InGen",
        "Wonka Industries",
        "Spacely Sprockets",
        "Acme Corporation",
        "Stark Industries",
        "LexCorp",
        "The Daily Planet",
        "Spacely Sprockets",
        "C.H.U.D. Industries",
        "Gekko & Co",
        "Duff Beer",
        "Genco Pura Olive Oil Company",
        "Flint Tropics",
        "Oscorp",
        "Wonka Industries",
        "Weyland-Yutani Corporation",
        "Umbrella Corporation",
        "Bluth Company",
        "Buy More",
        "Los Pollos Hermanos",
        "Aperture Science",
        "BnL",
        "Cyberdyne Systems",
        "InGen",
        "Sterling Cooper",
        "Gringotts",
        "Genco",
        "LexCorp",
        "Wernham Hogg",
        "Monsters Inc.",
        "Vandelay Industries"
        // Add more entries as needed
    ];

    private $hikingEventTitles = [
        "Adventure",
        "Summit",
        "Trails",
        "Explorers",
        "Trek",
        "Expedition",
        "Outdoors",
        "Challenge",
        "Quest",
        "Journey",
        "Trailblazers",
        "Roamers",
        "Pathfinders",
        "Ascend",
        "Wanderers",
        "Venture",
        "Climb",
        "Hikers",
        "Ramblers",
        "Explore",
        "Camping",
        "Wilderness",
        "Scenic",
        "Nature",
        "Backpacking",
        "Explore",
        "Pursuit",
        "Discover",
        "Summit",
        "Traverse",
        "Crest",
        "Peaks",
        "Range",
        "Footsteps",
        "Expedition",
        "Hiking",
        "Trail",
        "Adventurers",
        "Roam",
        "Climbers",
        "Escape",
        "Wander",
        "Explore",
        "Discover",
        "Trek",
        "Expedition",
        "Outdoors",
        "Journey",
        "Challenges",
        "Quest",
        "Traverse",
        "Ascend",
        "Conquer",
        "Nature",
        "Hike",
        "Ramblers",
        "Explorers"
        // Add more entries as needed
    ];





}
