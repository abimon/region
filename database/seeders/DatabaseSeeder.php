<?php

namespace Database\Seeders;

// use App\Models\Announcement;
// use App\Models\Assigment;
// use App\Models\User;
use App\Models\ClubRequirement;
use App\Models\SubRequirement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User=>=>factory(50)->create();
        // Announcement=>=>factory(100)->create();
        // Assigment=>=>factory(100)->create();
        $data = [
            [
                'category' => 'PREREQUISITES',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' =>
                        'Be a baptized member, in regular standing, of the Seventh-day Adventist Church.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 2,
                        'description' =>
                        'Be at least 16 years of age to start this card and 18 years of age at Investiture.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 3,
                        'description' =>
                        'Complete a background check and child protection course if 18+ years old.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 4,
                        'description' =>
                        'Write a one-page report or video on what it means to be a MG and why you want to become a MG.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 5,
                        'description' => 'Complete the following workshops=>',
                        'subrequirements' => [
                            '1. Club Ministry=> Purpose & History',
                            '2. Club Organization',
                            '3. Programming & Planning',
                            '4. Club Outreach',
                            '5. Ceremonies & Drill',
                            '6. Developmental Growth'
                        ]
                    ]
                ]
            ],
            [
                'category' => 'I. LEADERSHIP IDENTITY & GROWTH (WISDOM)',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' => 'Complete the following workshops=>',
                        'subrequirements' => [
                            '1. Vision, Mission, Motivation',
                            '2. Christian Leadership',
                            '3. Discipline & Discipleship',
                            '4. Child & Youth Evangelism',
                            '5. Creating Effective Worships',
                            '6. Communication=> Theory & Practice',
                            '7. Education=> Theory & Practice',
                            '8. Resources for Creative Instruction'
                        ]
                    ],
                    [
                        'id' => 2,
                        'description' =>
                        'Read or listen to the book Education by Ellen White. Write a one-page reflection on what you have learned and how you can apply it in your ministry.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 3,
                        'description' =>
                        'Read or listen to a book about Adventist leadership selected by your Conference/Mission and do two Share Section options.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 4,
                        'description' =>
                        'For each of the following, complete a survey and write a two-page reflection paper=>',
                        'subrequirements' => ['1. Spiritual Gifts', '2. Personalities']
                    ],
                    [
                        'id' => 5,
                        'description' =>
                        'For at least one year, be an active staff member in an Adventurer or Pathfinder Club, or teach a Sabbath School for these age groups. Complete each of the following=>',
                        'subrequirements' => [
                            '1. Attend at least 75% of all staff meetings.',
                            '2. Teach three Adventurer awards or two Pathfinder honors.'
                        ]
                    ]
                ]
            ],
            [
                'category' => 'II. LIFESTYLE DEVELOPMENT (STATURE)',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' =>
                        'Choose one of the following and record your progress=>',
                        'subrequirements' => [
                            'Have or earn the Physical Fitness honor.',
                            'Have or earn the Sportsman Master award.',
                            'Complete the physical fitness section of the AY Silver Award or Gold Award.',
                            'In consultation with your Master Guide Mentor, choose a fitness app and complete at least a three-month program.',
                            'Complete a three-month physical fitness program recommended by your doctor.'
                        ]
                    ],
                    [
                        'id' => 2,
                        'description' => 'Have or earn each of the following honors=>',
                        'subrequirements' => [
                            '1. Basic Water Safety',
                            '2. Camp Safety',
                            '3. Camping Skills I',
                            '4. Camping Skills II',
                            '5. Temperance',
                            '6. Medical, Risk Management and Child Safety Issues',
                            '7. Introduction to Teaching'
                        ]
                    ],
                    [
                        'id' => 3,
                        'description' =>
                        'Have or earn at least three of the following honors=>',
                        'subrequirements' => [
                            'Backpacking',
                            'Basic Rescue',
                            'Camping Skills III',
                            'Camping Skills IV',
                            'Drilling & Marching',
                            'Ecology',
                            'Fire Building & Camp Cookery',
                            'Knot Tying',
                            'Nutrition',
                            'Orienteering'
                        ]
                    ],
                    [
                        'id' => 4,
                        'description' =>
                        'Hold a current Red Cross First Aid & CPR certificate or its equivalent.',
                        'subrequirements' => []
                    ]
                ]
            ],
            [
                'category' => 'III. SPIRITUAL GROWTH (FAVOR WITH GOD)',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' =>
                        'Choose one of the following and do two Share Section options=>',
                        'subrequirements' => [
                            'Read or listen to the four Gospels and The Desire of Ages by Ellen G. White.',
                            'Read or listen to the Encounter Plan, Series 1=> Christ the Way.'
                        ]
                    ],
                    [
                        'id' => 2,
                        'description' =>
                        'Keep a devotional journal for at least one month, summarizing what you learn in your devotional time and outlining how you are growing in your faith.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 3,
                        'description' =>
                        'Read or listen to the book Steps to Christ by Ellen G. White and do two Share Section options.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 4,
                        'description' =>
                        'Write a one-paragraph personal reflection on each of the 28 Fundamental Beliefs.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 5,
                        'description' => 'Choose one of the following=>',
                        'subrequirements' => [
                            'Teach a three-month Bible class/baptismal study',
                            "Teach five of the following beliefs at a church-approved program=> [Creation, The Sabbath, The Experience of Salvation, Christ's Ministry in the Heavenly Sanctuary, Growing in Christ, The Remnant and its Mission, The Second Coming of Christ, Baptism, Death and Resurrection, Spiritual Gifts and Ministries]"
                        ]
                    ],
                    [
                        'id' => 6,
                        'description' =>
                        'Choose one of the following and do two Share Section options=>',
                        'subrequirements' => [
                            'Have or earn the Sanctuary honor.',
                            'Attend a Conference/Mission approved workshop about the Sanctuary.'
                        ]
                    ],
                    [
                        'id' => 7,
                        'description' =>
                        'Choose one of the following and do two Share Section options=>',
                        'subrequirements' => [
                            'Have or earn the Adventist Pioneer Heritage honor.',
                            'Watch the series Tell the World.',
                            'Watch the series Keepers of the Flame.',
                            'Read or listen to a book on church heritage approved by your Conference/Mission.'
                        ]
                    ]
                ]
            ],
            [
                'category' => 'IV. COMMUNITY DEVELOPMENT (FAVOR WITH MAN)',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' => 'Have or earn the Personal Evangelism honor.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 2,
                        'description' => 'Have or earn three of the following honors=>',
                        'subrequirements' => [
                            'Cultural Diversity Appreciation',
                            'Peacemaker',
                            'Social Media',
                            'One ADRA honor not previously earned',
                            'One Household Arts honor not previously earned'
                        ]
                    ],
                    [
                        'id' => 3,
                        'description' =>
                        'Participate in organizing three social/fellowship events with your local church.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 4,
                        'description' =>
                        'Choose one of the following and when possible, involve your club or youth group=>',
                        'subrequirements' => [
                            'Meet with a local government agency, non-profit, or other organization and participate in a community service project.',
                            'Work in an outreach initiative with your local coordinator of ADRA (or an equivalent ministry) for a minimum of three months.'
                        ]
                    ]
                ]
            ],
            [
                'category' => 'SHARE SECTION',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' =>
                        'Share what you are learning! Include evidence (picture, written summary, link, etc.) in your Portfolio.',
                        'subrequirements' => [
                            '1. Write three inspirational cards and give them to a friend that does not attend church.',
                            '2. Post three of your favorite quotes (with brief commentary) on social media or a personal blog.',
                            '3. Record a video or podcast summarizing three ideas you learned and post it online.',
                            '4. Discuss with a group three concepts you can apply to evangelism.',
                            '5. Present a devotional to your club or youth group.',
                            '6. Share in another creative way approved by your Conference/Mission.'
                        ]
                    ]
                ]
            ],
            [
                'category' => 'INVESTITURE REQUIREMENTS',
                'requirements' => [
                    [
                        'id' => 1,
                        'description' =>
                        'Have a written recommendation from your local church board, stating that you are a baptized member in regular standing.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 2,
                        'description' =>
                        'Complete all requirements of the Master Guide curriculum and pass a Portfolio review (see Manual) conducted by your Conference/Mission.',
                        'subrequirements' => []
                    ],
                    [
                        'id' => 3,
                        'description' =>
                        'The Master Guide program must be completed in a minimum of one year and a maximum of three years. Any requirements fulfilled outside of the three-year limit must be repeated. This time limit does not apply to honors previously earned or to candidates who require specific physical or medical accommodation.',
                        'subrequirements' => []
                    ]
                ]
            ]
        ];
        foreach($data as $item){
            $category = $item['category'];
            $requirements = $item['requirements'];
            foreach($requirements as $requirement){
                $req=ClubRequirement::create([
                    'club'=>'master-guide',
                    'title' => $category,
                    'description' => $requirement['description']
                ]);
                foreach($requirement['subrequirements'] as $subrequirement){
                    SubRequirement::create([
                        'requirement_id' => $req->id,
                        'description' => $subrequirement
                    ]);
                }
            }
        }
    }

}
