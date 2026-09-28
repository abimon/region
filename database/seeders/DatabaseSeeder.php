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
        // 
        $data = [
            [
                'class' => 'friend',
                "requirements" => [
                    [
                        'title' => 'GENERAL',
                        "requirements" => [
                            '1. Be 10 years old and/or in grade 5 or its equivalent.',
                            '2. Be an active member of the AJY Society or Pathfinder Club.',
                            '3. Memorize and explain the Pathfinder Pledge and Law.',
                            '4. Read the book The Happy Path (or similar book on the Pledge and Law).',
                            '5. Have a current Book Club Certificate.'
                        ],
                        "advanced" => [
                            '1. Know, sing, or play and explain the meaning of the Pathfinder Song.'
                        ]
                    ],
                    [
                        'title' => 'SPIRITUAL DISCOVERY',
                        "requirements" => [
                            '1. Memorize the Old Testament books of the Bible and know the five areas into which the books are grouped. Demonstrate your ability to find any given book.',
                            '2. Have a current memory gem certificate.',
                            '3. Know and explain Psalm 23 or Psalm 46.',
                            '4. During several worship periods, read with your parents the historical prologue to the book Early Writings and list the main events of the SDA church or fulfill other options as mentioned on page 26.'
                        ],
                        "advanced" => [
                            '1. Complete the crossword puzzle based on the prologue to Early Writings.',
                            '2. In consultation with your leader, choose one of the following Old Testament characters=> Joseph, Jonah, Esther, or Ruth. Discuss with your group Christ’s loving care and deliverance as shown in the story.'
                        ]
                    ],
                    [
                        'title' => 'SERVING OTHERS',
                        "requirements" => [
                            '1. By consultation with your leader, work out ways to spend at least two hours expressing your friendship to someone in need in your community by doing any two of the following=>\na. Visit someone who needs friendship.\nb. Help someone in need.\nc. With the help of others spend a half day on a community, school, or church project.',
                            '2. Prove yourself a good citizen at home and at school.'
                        ],
                        "advanced" => [
                            '1. Bring at least two visitors to Sabbath school or Pathfinder meetings.'
                        ]
                    ],
                    [
                        'title' => 'FRIENDSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. List ten qualities of being a good friend and discuss four everyday situations where you have practiced the “Golden Rule.”',
                            '2. Know your national anthem and explain its meaning.'
                        ],
                        "advanced" => [
                            '1. Demonstrate good table manners with a group of persons of various ages.'
                        ]
                    ],
                    [
                        'title' => 'HEALTH AND FITNESS',
                        "requirements" => [
                            '1. Complete the following=>\na. Discuss the temperance principles in the life of Daniel, or participate in a presentation or role play on Daniel 1.\nb. Memorize and explain Daniel 1=>8, and either sign the appropriate pledge card or design your own pledge card showing why you choose a life style in harmony with the true principles of temperance.',
                            '2. Learn the principles of a healthful diet and engage in a project preparing a chart of basic food groups.',
                            '3. Complete the Beginner’s ,Swimming Honor.'
                        ],
                        "advanced" => ['1. HIV/AIDS curriculum']
                    ],
                    [
                        'title' => 'ORGANIZATION AND LEADERSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Plan and take a three hour or eight kilometer hike. Plan to complete a requirement under the Nature Study or Outdoor Life sections or a Nature Honor.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'NATURE STUDY',
                        "requirements" => [
                            '1. Complete one of the following honors=> Cats, Dogs, Mammals, Seeds, Bird Pets.',
                            '2. Know different methods of purifying water and demonstrate your ability to build a camp shelter. Consider the significance of Jesus as the water of life and as our refuge place.'
                        ],
                        "advanced" => [
                            '1. Know and identify ten wild flowers and ten insects in your area.'
                        ]
                    ],
                    [
                        'title' => 'OUTDOOR LIFE',
                        "requirements" => [
                            '1. Know how ropes are made and demonstrate how to care for rope in the correct manner. Tie and know the practical use of the following knots=> Overhand, Granny, Square, Slip, Double Bow, Two Half Hitches, Clove Hitch, Bowline.',
                            '2. Participate in an overnight campout.',
                            '3. Pass a test in general safety.',
                            '4. Pitch and strike a tent and make a camp bed.',
                            '5. Know ten hiking rules and know what to do when lost.',
                            '6. Learn the signs for track and trail. Be able to lay a two kilometer trail that others can follow and be able to track a two kilometer trail.'
                        ],
                        "advanced" => [
                            '1. Start a fire with one match, using natural materials, and keep that fire going.',
                            '2. Properly use the knife and axe, and know ten safety rules in their use.',
                            '3. Tie five speed knots.',
                            '4. Demonstrate baking, boiling, and frying camp food.'
                        ]
                    ],
                    [
                        'title' => 'LIFESTYLE ENRICHMENT',
                        "requirements" => ['1. Complete one honor in Arts and Crafts.'],
                        "advanced" => [
                            '1. Complete one honor in Vocational or Outdoor Industries.'
                        ]
                    ]
                ]
            ],
            [
                "class" => 'companion',
                "requirements" => [
                    [
                        'title' => 'GENERAL',
                        "requirements" => [
                            '1. Be 11 years old and/or in grade 6 or its equivalent.',
                            '2. Be an active member of the Pathfinder Club.',
                            '3. Learn or review the meaning of the Pathfinder Pledge and illustrate its meaning in an interesting way.',
                            '4. Read the book The Happy Path or a similar book on the Pledge and Law if not previously read.',
                            '5. Have a current Book Club Certificate and write at least a paragraph of review on one book of your choice.'
                        ],
                        "advanced" => [
                            '1. Know the composition and proper use of your national flag.'
                        ]
                    ],
                    [
                        'title' => 'SPIRITUAL DISCOVERY',
                        "requirements" => [
                            '1. Memorize the New Testament books and know the four areas into which the books are grouped. Demonstrate your ability to find any given book.',
                            '2. Hold a current memory gem certificate.',
                            '3. Choose, in consultation with your leader, one of the following areas=> a. One of Christ’s Parables\nOne of Christ’s Miracles\nSermon on the Mount\nSecond Advent Sermon and show your knowledge of what Christ taught in one of the following ways=> a. Discussion with the leader\nGroup activity\nGiving a talk',
                            '4. Read the Gospels of Matthew and Mark in any translation. Commit to memory any two of the following=>\nBeatitude (Matthew 3=>3-12)\nLord’s Prayer (Matthew 6=>9-13)\nChrist’s Return (Matthew 24=>4-7, 11-14)\nGospel Commission (Matthew 28=>18-20)'
                        ],
                        "advanced" => [
                            '1. Read about Ellen White’s first vision and discuss how God uses prophets to present His message to the church.',
                            '2. Complete the crossword puzzle on the first vision of Ellen White.'
                        ]
                    ],
                    [
                        'title' => 'SERVING OTHERS',
                        "requirements" => [
                            '1. By consultation with your leader, work out ways to spend at least two hours in your community, demonstrating in a consistent manner real companionship to someone else.',
                            '2. Spend at least half a day participating in a project that will benefit the community or your church.'
                        ],
                        "advanced" => [
                            '1. Participate in an outreach activity and bring a non-SDA friend to participate or observe.'
                        ]
                    ],
                    [
                        'title' => 'FRIENDSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Discuss the principle and demonstrate the meaning of respect for people of different cultures and gender.'
                        ],
                        "advanced" => [
                            '1. Discuss and demonstrate respect for your parents/guardian and what they provide for you.'
                        ]
                    ],
                    [
                        'title' => 'HEALTH AND FITNESS',
                        "requirements" => [
                            '1. Memorize and explain 1 Cor. 9=>24-27.',
                            '2. Discuss with your leader physical fitness and regular exercise as they relate to healthful living.',
                            '3. Learn about the detrimental effects of smoking on health and fitness, and write your own pledge of commitment to abstaining from the use of tobacco.',
                            '4. Complete the Advanced Beginner’s Swimming Honor.'
                        ],
                        "advanced" => [
                            '1. HIV/AIDS curriculum',
                            '2. Attend a Five Day Plan, or view two films on health, or make a poster on smoking or drug abuse, or help prepare a display on tobacco for a show, etc.'
                        ]
                    ],
                    [
                        'title' => 'ORGANIZATION AND LEADERSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Plan and lead a devotional service for your group.',
                            '2. Help your unit or club plan a special activity such as a party, hike, or overnight campout.'
                        ],
                        "advanced" => [
                            '1. Participate in a special club event such as an investiture, open house, induction, or Pathfinder Sabbath, and then evaluate the event to determine how it can be improved.'
                        ]
                    ],
                    [
                        'title' => 'NATURE STUDY',
                        "requirements" => [
                            '1. Participate in nature games or participate in a one-hour nature walk.',
                            '2. Complete one of the following honors=> Amphibians, Birds, Livestock, Poultry, Reptiles, Shells, Trees, or Shrubs.',
                            '3. Review the study of creation, and keep a seven-day outdoor log of your personal observations from nature in which each day focuses on those parts that were created on that day.'
                        ],
                        "advanced" => [
                            '1. Identify and describe twelve birds in the wild and twelve native trees.'
                        ]
                    ],
                    [
                        'title' => 'OUTDOOR LIFE',
                        "requirements" => [
                            '1. Find the eight general directions without the aid of a compass.',
                            '2. Participate in a two-night campout. Know at least six points relative to the selection of a campsite.',
                            '3. Learn or review the Friend knots. Tie and know the practical use of the following knots=> Sheet Bend, Sheepshank, Fisherman’s Knot, Timber Hitch, Taut Line Hitch. Learn three basic lashings.',
                            '4. Pass a test in Companion first aid.'
                        ],
                        "advanced" => [
                            '1. Build five different fires and describe their uses. Discuss the safety rules in lighting fires, or hike eight kilometers and keep a log.',
                            '2. Cook a camp meal without utensils.',
                            '3. Prepare a knot board with at least fifteen different knots.'
                        ]
                    ],
                    [
                        'title' => 'LIFESTYLE ENRICHMENT',
                        "requirements" => [
                            '1. Complete one Honor in Arts and Crafts not previously earned.'
                        ],
                        "advanced" => [
                            '1. Complete one Honor in Household Arts, Health & Science, Vocational, or Outdoor Industries not previously earned.'
                        ]
                    ]
                ]
            ],
            [
                "class" => 'explorer',
                "requirements" => [
                    [
                        'title' => 'GENERAL',
                        "requirements" => [
                            '1. Be 12 years old and/or in Grade 7 or its equivalent.',
                            '2. Be an active member of the AJY Society and Pathfinder Club.',
                            '3. Learn or review the meaning of the Pathfinder Law and demonstrate your understanding by participating in one of the following=> role play, panel discussion, essay, or prepare a project of your choice.',
                            '4. Read the book The Happy Path if not previously read.',
                            '5. Have a current Book Club Certificate and write at least a paragraph of review on each book.'
                        ],
                        "advanced" => [
                            '1. Know the composition and proper use of the Pathfinder flag and Unit Guidon.'
                        ]
                    ],
                    [
                        'title' => 'SPIRITUAL DISCOVERY',
                        "requirements" => [
                            '1. Become familiar with the use of a concordance.',
                            '2. Hold a current memory gem certificate.',
                            '3. Read the gospels Luke and John in any translation, and discuss in your group any three of the following=>\na. Luke 4=>16-19 The Scripture Reading\nb. Luke 11=>9-13 Ask, Seek, Knock\nc. Luke 21=>25-28 Signs of Second Coming\nd. John 13=>12-17 Humility\ne. John 14=> 1-3 Lord’s Promise\nf. John 15=>5-8 Vine and Branches',
                            '4. In consultation with your leader, choose one of the following areas=>\na. John 3 Nicodemus\nb. John 4 The Woman at the Well\nc. Luke 15 The Prodigal Son\nd. Luke 10 The Good Samaritan\ne. Luke 19 Zaccheaus',
                            '5. Share your understanding of how Jesus saves individuals by using one of the following methods=>\na. Group discussion with your leader.\nb. Giving a talk at AJY’s.\nc. Writing an essay.\nd. Making a series of pictures, charts, or models.\ne. Writing a poem or song.',
                            '6. Memorize and explain Proverbs 20=> 1 and Proverbs 23=>29-32.'
                        ],
                        "advanced" => [
                            '1. Read about J. N. Andrews. Discuss the importance of mission service to the church and why Christ gave the Great Commission (Matthew 28=> 18-20).',
                            '2. Complete the map work on missionaries and places of service.'
                        ]
                    ],
                    [
                        'title' => 'SERVING OTHERS',
                        "requirements" => [
                            '1. Be familiar with the community services in your area and give assistance to at least one.',
                            '2. Participate in at least 3 church programs.'
                        ],
                        "advanced" => [
                            '1. Enroll a new member in Sabbath school, Pathfinders, or Bible correspondence course.'
                        ]
                    ],
                    [
                        'title' => 'FRIENDSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Participate in a panel discussion or skit or peer pressure and its role in your decision making.',
                            '2. Tour your municipal offices or have a city official visit your group and then explain five ways you can cooperate with them.'
                        ],
                        "advanced" => [
                            '1. Earn one of the following honors=>\na. Christian Grooming and Manners\nb. Family Life'
                        ]
                    ],
                    [
                        'title' => 'HEALTH AND FITNESS',
                        "requirements" => [
                            '1. Complete one of the following requirements=>\na. Participate in a group discussion on the physical effects of drugs and alcohol on the body.\nb. View an audio/visual on alcohol or other drugs, and discuss the effects on the human body.',
                            '2. Peer pressure discussion.'
                        ],
                        "advanced" => [
                            '1. Participate in a sixteen kilometer hike and make a list of clothing to be worn.',
                            '2. Peer Pressure and AIDS Awareness.'
                        ]
                    ],
                    [
                        'title' => 'ORGANIZATION AND LEADERSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Lead out in your club’s opening exercises or a Sabbath school program.',
                            '2. Help your unit or club plan a special outreach activity such as a project for unfortunate children, community beautification, etc. and carry out the activity.'
                        ],
                        "advanced" => [
                            '1. Participate in a special club event such as an investiture, open house, induction, Pathfinder Sabbath, etc. and participate in the evaluation of the event afterwards along with the Companion Class.'
                        ]
                    ],
                    [
                        'title' => 'NATURE STUDY',
                        "requirements" => [
                            '1. If you live in the Northern Hemisphere, be able to identify the North Star, Orion, Pleiades, and two planets. If you live in the Southern Hemisphere, identify Achernar, the Southern Cross, Centaurus, and Orion. Know the spiritual significance of Orion as told in Early Writings.',
                            '2. Complete one of the following honors=> Animal Tracking, Cacti, Flowers, Stars, or Weather.'
                        ],
                        "advanced" => [
                            '1. Identify six tracks of animals or birds. Make a plaster cast of three tracks.'
                        ]
                    ],
                    [
                        'title' => 'OUTDOOR LIFE',
                        "requirements" => [
                            '1. Participate in a two-night campout. Describe six points of a good campsite. Plan and cook two meals.',
                            '2. Pass a test in Explorer first aid.',
                            '3. Explain what a topographical map is, what you can expect to find on it, and its uses. Identify at least twenty signs and symbols used on topographic maps.'
                        ],
                        "advanced" => [
                            '1. Review the basic lashings and build one article of camp furniture.',
                            '2. Plan a menu for a three day camping trip for four people using at least three different dehydrated foods.',
                            '3. Be able to send and receive the semaphore alphabet, OR Be able to send and receive the international Morse code by wigwag, OR Know the alphabet in sign language for the deaf, OR Have a basic knowledge of procedures of two-way radio communication.'
                        ]
                    ],
                    [
                        'title' => 'LIFESTYLE ENRICHMENT',
                        "requirements" => [
                            '1. Complete one honor in Household Arts or Arts and Crafts not previously earned.'
                        ],
                        "advanced" => [
                            '1. Complete one honor in Outreach Ministry, Health & Science, Vocational, or Outdoor Industries not previously earned.'
                        ]
                    ]
                ]
            ],
            [
                "class" => 'ranger',
                "requirements" => [
                    [
                        'title' => 'GENERAL',
                        "requirements" => [
                            '1. Be a teenager 13 years of age and/or in Grade 8 or its equivalent.',
                            '2. Memorize and understand the Adventist Youth Aim and Motto.',
                            '3. Be an active member of the Pathfinder Club.',
                            '4. Select and read three books of your choice from the Teen Book Club List.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'SPIRITUAL DISCOVERY',
                        "requirements" => [
                            '1. Discover in group discussion=>\na. What Christianity is.\nb. The marks of a true disciple.\nc. The forces involved in becoming a Christian.',
                            '2. Participate in a Bible marking program on the inspiration of the Bible.',
                            '3. Enroll at least three people in a Bible Correspondence Course.',
                            '4. Have a current Memory Gem Certificate.'
                        ],
                        "advanced" => [
                            '1. Complete the Christian Citizenship Honor if not previously done.'
                        ]
                    ],
                    [
                        'title' => 'SERVING OTHERS',
                        "requirements" => [
                            '1. Under the direction of your leader, participate at least once in two different types of outreach programs.',
                            '2. With the help of a friend, spend a full day (at least eight hours) working on a project for your church, school, or community.'
                        ],
                        "advanced" => [
                            '1. Conduct two Bible studies with non-Seventh-day Adventists.'
                        ]
                    ],
                    [
                        'title' => 'FRIENDSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. In group discussion and by personal inquiry, examine your attitudes to two of the following topics=>\na. Self-Confidence\nb. Friendship\nc. The Social Graces\nd. Will Power'
                        ],
                        "advanced" => [
                            '1. Role-play the story of the Good Samaritan and think of ways to serve three neighbors, and then do so.'
                        ]
                    ],
                    [
                        'title' => 'HEALTH AND FITNESS',
                        "requirements" => [
                            '1. Participate in one of the following=>\na. Discuss the principles of physical fitness. Provide an outline of your daily exercise program. Write out and sign a personal pledge of commitment to a regular exercise program.\nb. Discuss the natural advantages of living the Adventist Christian lifestyle in accordance with biblical principles.'
                        ],
                        "advanced" => [
                            '1. Participate in one of the following activities=>\na. Hike 15km and keep a log.\nb. Ride a horse 15 km.\nc. Go on a one day canoe trip.\nd. Cycle 80 km.\ne. Swim 1 km.',
                            '2. Discuss the concept, types, and purpose of dating.'
                        ]
                    ],
                    [
                        'title' => 'ORGANIZATION AND LEADERSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Attend at least one church business meeting. Prepare a brief report for discussion in your group.',
                            '2. With your group, make plans for a social activity at least once a quarter.'
                        ],
                        "advanced" => [
                            '1. Complete requirements 3 and 6 of the Drilling and Marching Honor if not previously done.'
                        ]
                    ],
                    [
                        'title' => 'NATURE STUDY',
                        "requirements" => [
                            '1. Review the story of the flood and study at least three different fossils; explain their origin and relate them to breaking God’s Law.',
                            '2. Complete a nature honor not previously earned.'
                        ],
                        "advanced" => [
                            '1. Be able to identify through photographs, sketches, pictures, or real life one of the following categories=> 25 tree leaves; 25 rocks and minerals; 25 wild flowers; 25 butterflies and moths; 25 shells.'
                        ]
                    ],
                    [
                        'title' => 'OUTDOOR LIFE',
                        "requirements" => [
                            '1. Build and demonstrate the use of a reflector oven by cooking something.',
                            '2. Participate in a two-night campout. Be able to pack a pack or ruck sack, including personal gear and food sufficient for your participation in a two-night campout.',
                            '3. Pass a test in Ranger First Aid.'
                        ],
                        "advanced" => [
                            '1. Complete the Orienteering Honor.',
                            '2. Be able to light a fire on a rainy day or in the snow. Know where to get the dry material to keep it going. Demonstrate ability to properly tighten and replace an axe handle.',
                            '3. Complete one of the following requirements=>\na. Know on sight, prepare, and eat ten varieties of wild plant foods.\nb. Be able to read and receive 35 letters a minute by semaphore code.\nc. Be able to send and receive 15 letters a minute by wigwag, using the international code.\nd. Be able to send and receive Matthew 24 in sign language for the deaf.\ne. Take part in a simple emergency search and rescue operation using two way radios.'
                        ]
                    ],
                    [
                        'title' => 'LIFESTYLE ENRICHMENT',
                        "requirements" => [
                            '1. Complete one honor in Outreach Ministry, Vocational, or Outdoor Industries not previously earned.'
                        ],
                        "advanced" => [
                            '1. Complete one honor in Recreation or Arts and Crafts not previously earned.'
                        ]
                    ]
                ]
            ],
            [
                "class" => 'voyager',
                "requirements" => [
                    [
                        'title' => 'GENERAL',
                        "requirements" => [
                            '1. Be a teenager 14 years of age, and/or in grade 9 or its equivalent.',
                            '2. Through memorization and discussion, explain the meaning of the Adventist Youth Pledge.',
                            '3. Be an active member of Pathfinders.',
                            '4. Select and read three books of your choice from the Teen Book Club list.'
                        ],
                        "advanced" => [
                            '1. Make a written or oral presentation on respect for God’s law and civil authority giving at least ten principles of moral behavior.'
                        ]
                    ],
                    [
                        'title' => 'SPIRITUAL DISCOVERY',
                        "requirements" => [
                            '1. Study the personal work of the Holy Spirit as it relates to mankind, and discuss His involvement in spiritual growth.',
                            '2. By study and group discussion, increase your knowledge of the last-day events that lead up to the Second Advent.',
                            '3. Through study and discussion of Bible evidence, discover the true meaning of Sabbath keeping.',
                            '4. Have a current Memory Gem Certificate.'
                        ],
                        "advanced" => [
                            '1. Read the books of Proverbs, Habakkuk, Isaiah, Malachi, and Jeremiah or complete the Junior Bible Year reading program.'
                        ]
                    ],
                    [
                        'title' => 'SERVING OTHERS',
                        "requirements" => [
                            '1. As a group or individually, invite a friend to at least one of your church or conference teen/youth fellowship activities.',
                            '2. As a group or individually, help organize and participate in a project of service to others.',
                            '3. Discuss how a Christian Adventist youth relates to people in everyday situations, contacts, and associations.'
                        ],
                        "advanced" => [
                            '1. Spend at least two hours with your pastor, church elder, or deacon, observing them in their pastoral/case ministry.'
                        ]
                    ],
                    [
                        'title' => 'FRIENDSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. In group discussion and by personal inquiry, examine your attitudes toward two of the following topics=>\na. Self-Concept\nb. Human Relationships - Parents, Family, and Others\nc. Earning and Spending Money\nd. Peer Pressure',
                            '2. List and discuss the needs of the handicapped and help plan and participate in a party for them.'
                        ],
                        "advanced" => [
                            '1. Visit an institute for the physically or mentally challenged and present a report on the visit.'
                        ]
                    ],
                    [
                        'title' => 'HEALTH AND FITNESS',
                        "requirements" => [
                            '1. Choose and complete any two requirements from the Temperance Honor.',
                            '2. Organize a health party. Include health principles, talks, displays, etc.'
                        ],
                        "advanced" => [
                            '1. Study the effective refusal technique of Joseph and explain why it is important to use it today.'
                        ]
                    ],
                    [
                        'title' => 'ORGANIZATION AND LEADERSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Discuss and prepare a flow chart on local church organization and list the departmental functions.',
                            '2. Participate in local church programs on two occasions each, in two departments of the church.',
                            '3. Fulfill Requirements 3, 5, and 6 of the Stewardship Honor.',
                            '4. Complete the Drilling and Marching Honor.'
                        ],
                        "advanced" => ['1. Complete the Junior Youth Witnessing Honor.']
                    ],
                    [
                        'title' => 'NATURE STUDY',
                        "requirements" => [
                            '1. Review the story of Nicodemus and relate it to the life cycle of the butterfly, or draw a life-cycle chart of the caterpillar, giving the spiritual significance.',
                            '2. Complete a Nature Honor not previously earned.'
                        ],
                        "advanced" => [
                            '1. Plan a list of at least five nature related activities that may be used for Sabbath afternoons.'
                        ]
                    ],
                    [
                        'title' => 'OUTDOOR LIFE',
                        "requirements" => [
                            '1. With a party of not less than four, including an experienced adult counselor, hike 25 km. in a rural wilderness area, including one night in the open or in tents. The expedition planning should be a joint effort of the party and all food needed should be carried. From notes taken, participate in a group discussion, led by your counselor, on the terrain, flora, and fauna, as observed on the hike.',
                            '2. Complete one Recreational Honor not previously earned.',
                            '3. Pass a test in Voyager First Aid.'
                        ],
                        "advanced" => [
                            '1. Design and build five articles of camp furniture and design an entrance for your club camp that could be used for a camporee.'
                        ]
                    ],
                    [
                        'title' => 'LIFESTYLE ENRICHMENT',
                        "requirements" => [
                            '1. Complete one honor in Outreach Ministries, Health and Science, Household Arts, Outdoor Industry, or Vocational categories not previously earned.'
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'guide',
                "requirements" => [
                    [
                        'title' => 'GENERAL',
                        "requirements" => [
                            '1. Be a teenager 15 years of age, and/or in Grade 10 or its equivalent.',
                            '2. Know and understand the AY Legion of Honor.',
                            '3. Be an active member of Pathfinder Club.',
                            '4. Select and read one book of your choice from the Teen Book Club list, plus a book on local church history (select book for your division or country).'
                        ],
                        "advanced" => ['1. Complete the Stewardship Honor.']
                    ],
                    [
                        'title' => 'SPIRITUAL DISCOVERY',
                        "requirements" => [
                            '1. Discuss how the Christian can possess the gifts of the Spirit as described by Paul in his letter to the Galatians.',
                            '2. Study and discuss how the Old Testament sanctuary service points to the cross and the personal ministry of Jesus.',
                            '3. Read and outline three stories of Adventist pioneers. Tell these stories during a Pathfinder Club, AY, or Sabbath school worship time.',
                            '4. Have a current Memory Gem Certificate.'
                        ],
                        "advanced" => [
                            '1. Read Steps to Christ and write a one page report/essay.'
                        ]
                    ],
                    [
                        'title' => 'COMMUNITY OUTREACH',
                        "requirements" => [
                            '1. As a group (or individually) help organize and participate in one of the following=>\na. Make a friendship visit with a shut-in person.\nb. Adopt a person or family in need and assist them.\nc. Any other outreach of your choice approved by your leader.',
                            '2. Participate in a discussion on witnessing to other teenagers and put some of the guidelines into practice in a real situation.'
                        ],
                        "advanced" => [
                            '1. Complete one of the following=>\na. Bring two friends to at least two meetings sponsored by your church.\nb. Help plan and participate in at least four meetings of youth evangelism or similar events.'
                        ]
                    ],
                    [
                        'title' => 'FRIENDSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. In group discussion and by personal inquiry, examine your attitudes to two of the following topics=>\na. Choosing Your Career\nb. Moral Behavior\nc. Sex and Dating\nd. Choosing Your Life Partner'
                        ],
                        "advanced" => [
                            '1. Write (750 words minimum) or give an oral presentation (10 minutes minimum) on the subject of “How to make and keep friends.”'
                        ]
                    ],
                    [
                        'title' => 'HEALTH AND FITNESS',
                        "requirements" => [
                            '1. Make a presentation to elementary students on the subject of the laws of good health.',
                            '2. Complete one of the following activities=>\na. Write a poem or article for possible submission to one of the health/temperance journals of the church.\nb. Individually or as a group, organize and participate in a “Fun Run” or similar activity. Discuss and record your physical training program in preparation for this event.\nc. Read pages 102-125 in the book Temperance by Ellen White, and pass the true/false quiz.',
                            '3. Complete the Nutrition Honor or lead a group through the Physical Fitness Honor.'
                        ],
                        "advanced" => [
                            '1. Seeking God’s plan regarding sexual behavior – AIDS & STD’s.'
                        ]
                    ],
                    [
                        'title' => 'ORGANIZATION AND LEADERSHIP DEVELOPMENT',
                        "requirements" => [
                            '1. Following discussion, prepare a flow chart on denominational organization, with special details for your division.',
                            '2. Attend a conference sponsored Basic Pathfinder Staff Training Course.',
                            '3. Plan and teach at least two requirements of any Pathfinder honor for a group of Junior Pathfinders.',
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'NATURE STUDY',
                        "requirements" => [
                            '1. Read the story of Jesus’ childhood in Desire of Ages chapter 7 and relate it to the place of nature study in His education and ministry by presenting original nature lessons (parables) drawn from your study and observations to an audience.',
                            '2. Complete one of the following honors=>\na. Ecology\nb. Environmental Conservation'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'OUTDOOR LIVING',
                        "requirements" => [
                            '1. Go on a two-night pack camp. Discuss the equipment to be taken.',
                            '2. Plan and cook in a satisfactory manner a three-course meal on an open fire.',
                            '3. Complete an object of lashings or rope work.',
                            '4. Complete one honor not previously earned that can count towards the Aquatic, Sportsman, Recreation, or Wilderness Master.'
                        ],
                        "advanced" => ['1. Complete the Wilderness Master.']
                    ],
                    [
                        'title' => 'LIFESTYLE ENRICHMENT',
                        "requirements" => [
                            '1. Complete an honor in Outreach Ministries, Outdoor Industries, Vocational, Health and Science, or Household Arts not previously completed.'
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'little_lamb',
                "requirements" => [
                    [
                        'title' => 'BASIC',
                        "requirements" => [
                            '1. Recite the Adventurer Pledge.',
                            '2. Sing "Jesus Is My Shepherd."'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY GOD',
                        "requirements" => [
                            "1. Complete three or more of the following=>\na. Sing a song about Jesus.\nb. Listen to a story about Jesus.\nc. Say three things you've learned about Jesus.\nd. Make a craft about Jesus.\ne. Complete an activity about Jesus.\nf. Complete the Wooly Lamb star.\ng. Complete the Little Boy Jesus star."
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY SELF',
                        "requirements" => [
                            "1. Complete three or more of the following=>\na. Sing a song about the body.\nb. Listen to a story about the body.\nc. Say three things you've learned about bodies.\nd. Make a craft about bodies.\ne. Complete an activity about bodies.\nf. Complete the Sharing star.\ng. Complete the Healthy Foods star."
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY FAMILY',
                        "requirements" => [
                            "1. Complete three or more of the following=>\na. Sing a song about families.\nb. Listen to a story about families.\nc. Say three things you've learned about families.\nd. Make a craft about families.\ne. Complete an activity about families.\nf. Complete the Special Helper star.\ng. Complete the Healthy Me star."
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY WORLD',
                        "requirements" => [
                            "1. Complete three or more of the following=>\na. Sing a song about creation.\nb. Listen to a story about creation.\nc. Say three things you've learned about creation.\nd. Make a craft about creation.\ne. Complete an activity about creation.\nf. Complete the My Friend Jesus star.\ng. Complete the Community Helpers star."
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'early_bird',
                "requirements" => [
                    [
                        'title' => 'BASIC',
                        "requirements" => [
                            '1. Recite the Adventurer Pledge.',
                            "2. Recite your country's Pledge of Allegiance or national anthem.",
                            '3. Pray independently.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY GOD',
                        "requirements" => [
                            '1. Say the fourth commandment=> "Remember the Sabbath day, to keep it holy" (Exodus 20=>8).',
                            '2. Complete the Beavers chip.',
                            '3. Complete the Bible Friends chip.',
                            "4. Complete the God's World chip."
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY SELF',
                        "requirements" => [
                            '1. Complete the Alphabet Fun chip.',
                            '2. Complete the Manners Fun chip.',
                            '3. Complete the Know Your Body chip.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY FAMILY',
                        "requirements" => [
                            '1. Say the fifth commandment=> "Honor your father and your mother" (Exodus 20=>12).',
                            '2. Complete the Fire Safety chip.',
                            '3. Complete the Helping at Home chip.',
                            '4. Complete the Pets or Toys chip.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY WORLD',
                        "requirements" => [
                            '1. Complete the My Community Friends chip.',
                            '2. Complete the Playing with Friends chip.',
                            '3. Complete the Scavenger Hunt chip.'
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'busy_bee',
                "requirements" => [
                    [
                        'title' => 'BASIC',
                        "requirements" => [
                            '1. Recite and accept the Adventurer Pledge.',
                            '2. Complete the Busy Bee Reading award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY GOD',
                        "requirements" => [
                            "1. God's Plan to Save Me=> Create a story chart or lapbook showing the order in which these events took place=> Creation, The first sin, Jesus cares for me today, Jesus comes again, Heaven OR the Bible stories you are studying in school or Sabbath School.",
                            '2. Use your story chart or lapbook to show someone how much Jesus cares for you.',
                            "3. God's Message to Me=> Complete the Bible I award.",
                            "4. God's Power in My Life=> Spend regular quiet time with Jesus to talk with Him and learn about Him.",
                            '5. Ask three people why they pray.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY SELF',
                        "requirements" => [
                            '1. I Am Special=> Participate in an activity or make a craft showing different people who care for you.',
                            '2. I Can Make Wise Choices=> Name at least four different feelings. Participate in an activity or make a craft showing different feelings.',
                            '3. I Can Care for My Body=> Complete the Health Specialist award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY FAMILY',
                        "requirements" => [
                            '1. I Have a Family=> Show or explain what you like about each family member.',
                            '2. Family Members Care for Each Other=> Discover what the fifth commandment (Exodus 20=>12) tells you about families.',
                            '3. Act out three ways you can honor your family.',
                            '4. My Family Helps Me Care for Myself=> Complete the Safety Specialist award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY WORLD',
                        "requirements" => [
                            '1. The World of Friends=> Tell how you can be a good friend. Use=> Puppets, Role playing, or Your choice.',
                            '2. The World of Other People=> Discuss the work people do for your church. Learn about one job by helping the person do it.',
                            '3. The World of Nature=> Complete the Friend of Animals award.'
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'sunbeam',
                "requirements" => [
                    [
                        'title' => 'BASIC',
                        "requirements" => [
                            '1. Recite and accept the Adventurer Law.',
                            '2. Complete the Sunbeam Reading award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY GOD',
                        "requirements" => [
                            "1. God's Plan to Save Me=> Create a story chart or lapbook showing Jesus'=> Birth, Life, Death, Resurrection OR the Bible stories you are studying in school or Sabbath School.",
                            '2. Use your story chart or lapbook to show someone the joy of being saved by Jesus.',
                            "3. God's Message to Me=> Memorize and explain two Bible verses about being saved by Jesus=> Matthew 22=>37-39, 1 John 1=>9, Isaiah 1=>18, Romans 6=>23, or Your choice.",
                            '4. Name the two major parts of the Bible and the four gospels.',
                            '5. Complete the Friend of Jesus award.',
                            "6. God's Power in My Life=> Spend regular quiet time with Jesus to talk with Him and learn about Him.",
                            '7. Ask three people why they study the Bible.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY SELF',
                        "requirements" => [
                            '1. I Am Special=> Make a tracing of yourself. Decorate it with pictures and words which tell good things about yourself.',
                            '2. I Can Make Wise Choices=> Participate in an activity about choices.',
                            '3. I Can Care for My Body=> Complete the Fitness Fun award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY FAMILY',
                        "requirements" => [
                            '1. I Have a Family=> Create a family collage, scrapbook, crest, or coat of arms.',
                            '2. Family Members Care for Each Other=> Show how Jesus can help you deal with disagreements. Use=> Puppets, Role playing, or Your choice.',
                            '3. My Family Helps Me Care for Myself=> Complete the Road Safety award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY WORLD',
                        "requirements" => [
                            '1. The World of Friends=> Complete the Courtesy award.',
                            '2. The World of Other People=> Explore your neighborhood. List things that are good and things you could help make better.',
                            '3. From your list, choose ways and spend time making your neighborhood better.',
                            '4. The World of Nature=> Complete the Friend of Nature award.'
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'builder',
                "requirements" => [
                    [
                        'title' => 'BASIC',
                        "requirements" => [
                            '1. Recite and accept the Adventurer Pledge and Law.',
                            '2. Explain the Pledge.',
                            '3. Complete the Builder Reading award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY GOD',
                        "requirements" => [
                            "1. God's Plan to Save Me=> Create a story chart or lapbook showing the order in which these stories took place=> Paul-The disciples share Jesus' love, Martin Luther-God's church disobeys, Ellen White-God's church prepares for His coming, Yourself-I get ready to meet Jesus OR the Bible stories you are studying in school or Sabbath School.",
                            '2. Use your story chart or lapbook to show someone how to give their life to Jesus.',
                            "3. God's Message to Me=> Find, memorize, and explain three Bible verses about giving your life to Jesus=> Acts 16=>31, John 1=>12, Galatians 3=>26, 2 Corinthians 5=>17, Psalm 51=>10, or Your choice.",
                            '4. Name the books of the New Testament.',
                            "5. God's Power in My Life=> Spend regular quiet time with Jesus to talk with Him and learn about Him.",
                            '6. Complete the Prayer award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY SELF',
                        "requirements" => [
                            '1. I Am Special=> Put together a scrapbook, poster, or collage showing some things you can do to serve God and others.',
                            '2. I Can Make Wise Choices=> Complete the Media Critic award.',
                            '3. Participate in an activity that shows the results of good and bad decisions.',
                            '4. I Can Care for My Body=> Complete the Temperance award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY FAMILY',
                        "requirements" => [
                            '1. I Have a Family=> Create a family flag or banner or make a collage of stories and/or photographs about your family.',
                            '2. Find a story in the Bible about a family that changed.',
                            '3. Family Members Care for Each Other=> Play a game by having each family member show appreciation to each of the other members of the family.',
                            '4. My Family Helps Me Care for Myself=> Complete the Wise Steward award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY WORLD',
                        "requirements" => [
                            '1. The World of Friends=> Make friends with a person of another culture or generation, or someone who has a disability. Invite that person to a family or church event.',
                            '2. The World of Other People=> Know and explain your national anthem and flag.',
                            "3. Name your country's capital and the leader of your country.",
                            '4. The World of Nature=> Complete an award for nature not previously earned.'
                        ],
                        "advanced" => []
                    ]
                ]
            ],
            [
                "class" => 'helping_hand',
                "requirements" => [
                    [
                        'title' => 'BASIC',
                        "requirements" => [
                            '1. Recite the Adventurer Pledge and Law.',
                            '2. Explain the Law.',
                            '3. Complete the Helping Hand Reading award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY GOD',
                        "requirements" => [
                            "1. God's Plan to Save Me=> Create a story chart or lapbook showing the order in which these stories took place=> Noah-Water cleans the earth, Abraham-God calls a people, Moses-A promised land for God's people, David-God works with His people, Daniel-God's people disobey OR the Bible stories you are studying in school or Sabbath School.",
                            '2. Use your story chart or lapbook to show someone how to live for God.',
                            "3. God's Message to Me=> Complete the Bible II award.",
                            "4. God's Power in My Life=> Spend regular quiet time with Jesus to talk with Him and learn about Him. Journal your time by writing, drawing, or recording a video.",
                            '5. With an adult, choose one thing in your life which Jesus has promised to help you improve. With His help, pray, plan, and work together to reach your goal.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY SELF',
                        "requirements" => [
                            '1. I Am Special=> List some special interests and abilities God has given you.',
                            '2. Share your talents using one of the following=> Talent show, Show and tell.',
                            '3. I Can Make Wise Choices=> Learn the steps of good decision-making. Use them to solve two real-life problems.',
                            '4. I Can Care for My Body=> Complete the Hygiene award.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY FAMILY',
                        "requirements" => [
                            '1. I Have a Family=> Make a scrapbook or picture book about your family history.',
                            '2. Family Members Care for Each Other=> Help plan a special family worship, family night, or family outing.',
                            '3. My Family Helps Me Care for Myself=> Complete a level 3 or 4 award not previously earned.'
                        ],
                        "advanced" => []
                    ],
                    [
                        'title' => 'MY WORLD',
                        "requirements" => [
                            '1. The World of Friends=> Complete the Caring Friend award.',
                            '2. The World of Other People=> Complete the Country Fun award.',
                            '3. The World of Nature=> Complete the Environmentalist award.'
                        ],
                        "advanced" => []
                    ]
                ]
            ]
        ];
        foreach ($data as $item) {
            $class = $item["class"];
            $requirements = $item["requirements"];
            foreach ($requirements as $req) {
                foreach($req['requirements'] as $requ){
                    ClubRequirement::create([
                        'club'=>$class,
                        'title'=>$req['title'],
                        'description'=>$requ,
                    ]);
                }
                foreach ($req['advanced'] as $requ) {
                    ClubRequirement::create([
                        'club' => $class,
                        'title' => $req['title'].'*',
                        'description' => $requ,
                    ]);
                }
            }
        }
    }
}
