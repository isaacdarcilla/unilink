<?php

if (!function_exists('sports')) {
    /**
     * Get lists sports
     * @return array
     */
    function sports(): array
    {
        return [
            "Archery",
            "Clout shooting",
            "Field archery",
            "Flight shooting",
            "Kyūdō",
            "Roving",
            "Association croquet",
            "Badminton",
            "Biathlon",
            "Birling",
            "Boccie",
            "Bodybuilding",
            "Boules",
            "Bowling",
            "Candlepins",
            "Cocked hat",
            "Duckpins",
            "Ninepins",
            "Skittles",
            "Bowls",
            "Boxing",
            "Croquet",
            "Cross-country",
            "Darts",
            "Deck tennis",
            "Diving",
            "Fencing",
            "Kendo",
            "Golf",
            "Gymnastics",
            "Balance beam",
            "Floor exercise",
            "Horizontal bar",
            "Parallel bars",
            "Pommel horse",
            "Rhythmic gymnastics",
            "Rings",
            "Uneven parallel bars",
            "Vaulting",
            "Handball",
            "Horseshoe pitching",
            "Jai alai",
            "Martial arts",
            "Aikido",
            "Capoeira",
            "Hapkido",
            "Judo",
            "Jujitsu",
            "Karate",
            "Kendō",
            "Kung fu",
            "Pankration",
            "Savate",
            "Tai chi chuan",
            "Tae kwon do",
            "Mountaineering",
            "Orienteering",
            "Pall-mall",
            "Pelota",
            "Pentathlon",
            "Quoits",
            "Rackets",
            "Racquetball",
            "Real tennis",
            "Shooting",
            "Skeet shooting",
            "Trapshooting",
            "Shuffleboard",
            "Skating",
            "Ice skating",
            "Figure skating",
            "Speed skating",
            "Short-track speed skating",
            "Roller-skating",
            "Skibobbing",
            "Skiing",
            "Alpine skiing",
            "Downhill skiing",
            "Slalom",
            "Freestyle skiing",
            "Nordic skiing",
            "Cross-country skiing",
            "Ski jumping",
            "Speed skiing",
            "Waterskiing",
            "Snowboarding",
            "Squash rackets",
            "Squash tennis",
            "Swimming",
            "Synchronized swimming",
            "Tennis",
            "Paddle tennis",
            "Table tennis",
            "Track-and-field sports/athletics",
            "Decathlon",
            "Discus throw",
            "Hammer throw",
            "Heptathlon",
            "High jump",
            "Javelin throw",
            "Long jump",
            "Pole vault",
            "Running",
            "Hurdling",
            "Long-distance running",
            "Marathon",
            "Middle-distance running",
            "Sprint",
            "Steeplechase",
            "Shot put",
            "Triple jump",
            "Triathlon",
            "Underwater diving",
            "Weightlifting",
            "Powerlifting",
            "Weight throw",
            "Wrestling",
            "Catch-as-catch-can wrestling",
            "Cornish wrestling",
            "Cumberland wrestling",
            "Freestyle wrestling",
            "Greco-Roman wrestling",
            "Sambo",
            "Schwingen",
            "Sumo",
            "Team",
            "Association croquet",
            "Badminton",
            "Bandy",
            "Baseball",
            "Basketball",
            "Biathlon",
            "Boccie",
            "Boules",
            "Bowling",
            "Candlepins",
            "Cocked hat",
            "Duckpins",
            "Bowls",
            "Cricket",
            "Twenty20 cricket",
            "Croquet",
            "Cross-country",
            "Curling",
            "Darts",
            "Deck tennis",
            "Eisstockschiessen",
            "Field hockey",
            "Fives",
            "Football",
            "Australian rules football",
            "Football (soccer)",
            "Gaelic football",
            "Gridiron football",
            "Rugby",
            "Gymnastics",
            "Rhythmic gymnastics",
            "Handball",
            "Hooverball",
            "Horseshoe pitching",
            "Hurling",
            "Ice hockey",
            "Jai alai",
            "Kabaddi",
            "Korfball",
            "Lacrosse",
            "Box lacrosse",
            "Netball",
            "Orienteering",
            "Pelota",
            "Rackets",
            "Racquetball",
            "Real tennis",
            "Rounders",
            "Skating",
            "Figure skating",
            "Roller-skating",
            "Speed skating",
            "Skiing",
            "Nordic skiing",
            "Cross-country skiing",
            "Shinty",
            "Shuffleboard",
            "Softball",
            "Squash rackets",
            "Swimming",
            "Synchronized swimming",
            "Table tennis",
            "Team handball",
            "Tennis",
            "Paddle tennis",
            "Table tennis",
            "Track-and-field sports/athletics",
            "Running",
            "Relay race",
            "Triathlon",
            "Tug-of-war",
            "Volleyball",
            "Water polo",
            "Other",
            "Aerobatics",
            "Air racing",
            "Automobile racing",
            "Drag racing",
            "Grand Prix racing",
            "Gymkhana",
            "Hill climb",
            "Karting",
            "Midget-car racing",
            "Offroad racing",
            "Rally",
            "Speedway racing",
            "Sports-car racing",
            "Stock-car racing",
            "Ballooning",
            "Bullfighting",
            "Rejoneo",
            "Bungee jumping",
            "Camel racing",
            "Canoeing",
            "Wild-water racing",
            "Cockfighting",
            "Cycling",
            "Cycle ball",
            "Cyclo-cross",
            "Motor-paced race",
            "Pursuit racing",
            "Road race",
            "Pursuit racing",
            "Road race",
            "Six-day race",
            "Sprint",
            "Dog racing",
            "Dogsled racing",
            "Fishing",
            "Fly-fishing",
            "Gladiatorial sports",
            "Venationes",
            "Gliding",
            "Hang gliding",
            "Paragliding",
            "Horsemanship",
            "Buzkashī",
            "Chariot racing",
            "Dressage",
            "Harness racing",
            "Horse racing",
            "Hurdle race",
            "Joust",
            "Point-to-point",
            "Quarter-horse racing",
            "Show jumping",
            "Steeplechase",
            "Hunting",
            "Coursing",
            "Falconry",
            "Field trial",
            "Foxhunting",
            "Iceboating",
            "Motorcycle racing",
            "Motocross",
            "Motorcycle trial",
            "Motor-paced race",
            "Offroad racing",
            "Speedway racing",
            "Pigeon racing",
            "Polo",
            "Polocrosse",
            "Rodeo",
            "Bareback bronc-riding",
            "Bull riding",
            "Calf roping",
            "Steer roping",
            "Steer wrestling",
            "Team roping",
            "Rowing",
            "Skateboarding",
            "Skydiving",
            "Sledding",
            "Bobsledding",
            "Lugeing",
            "Skeleton sledding",
            "Tobogganing",
            "Surfing",
            "Windsurfing",
            "Tournament",
            "Mêlée",
        ];
    }
}