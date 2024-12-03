<?php

namespace App\Livewire;

use Livewire\Component;

class CSC413Component extends Component
{
    public array $data = [
        "truth" => "Truth",
        "confidence" => 92,
        "emotion" => "Happy",
        "stress_level" => "Low",
        "eye_dilation" => "Normal",
        "question" => "Where were you on the night of October 15th between 8 PM and 10 PM?",
        "answer" => "At home watching a movie with my family.",
        "heart_rate" => 75,
        "body_temperature" => 98.6,
        "body_language" => "Open"
    ]; // Store all metrics dynamically

    public function render()
    {
        return view('livewire.c-s-c413-component');
    }

    public function refresh_variables()
    {
        // Path to the file
        $file_path = base_path('CSC413_output.json');

        // Check if the file exists
        if (file_exists($file_path)) {
            // Read the file content
            $json_data = file_get_contents($file_path);
            $this->data = json_decode($json_data, true) ?? [];

        } else {
            // Clear data if the file doesn't exist
            $this->data = [
                "truth" => "Truth",
                "confidence" => 92,
                "emotion" => "Happy",
                "stress_level" => "Low",
                "eye_dilation" => "Normal",
                "question" => "Where were you on the night of October 15th between 8 PM and 10 PM?",
                "answer" => "At home watching a movie with my family.",
                "heart_rate" => 75,
                "body_temperature" => 98.6,
                "body_language" => "Open"
            ];
        }
    }
}
