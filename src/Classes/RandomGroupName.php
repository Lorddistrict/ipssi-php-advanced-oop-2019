<?php
declare(strict_types=1);

namespace Classes;

/**
 * Class RandomGroupName
 * @package Classes
 */
class RandomGroupName
{
    public function generateRandomGroupName(): ?string
    {
        $nameList = [
            'The Ancient Kangaroos',
            'The White Dinosaurs',
            'The Incredible Dinos',
            'The Magic Cougars',
            'The Pure Boars',
            'The Grand Anacondas',
            'The Silent Hyenas',
            'The Deadly Boomers',
            'The Gruesome Birds',
            'The Storm Bulldogs',
            'The Silent Octopi',
            'The Major Eagles',
            'The Quick Martians',
            'The Fantastic Mountaineers',
            'The Flying Cougars',
            'The Mean Komodos',
            'The Loyal Ostriches',
            'The Grim Aces',
            'The Silver Camels',
            'The Flawless Wizards',
        ];

        return array_rand($nameList, 1);
    }
}