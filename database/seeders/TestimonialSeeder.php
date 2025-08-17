<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            // Testimonial 1
            [
                'client_image' => 'upload/testimonial/1.jpg',
                'client_message' => 'The team was incredibly professional and attentive throughout the entire process. They helped me find the perfect apartment in a prime location. The communication was excellent, and they truly understood my needs. I highly recommend their services to anyone looking for a seamless real estate experience.',
                'client_name' => 'John Carter',
                'client_profession' => 'Software Engineer',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 2
            [
                'client_image' => 'upload/testimonial/2.jpg',
                'client_message' => 'I was a first-time homebuyer and a bit nervous, but they made the process so easy and stress-free. Their knowledge of the market is impressive, and they guided me every step of the way. I am now a proud homeowner, all thanks to them!',
                'client_name' => 'Emily White',
                'client_profession' => 'Graphic Designer',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 3
            [
                'client_image' => 'upload/testimonial/3.jpg',
                'client_message' => 'Finding a rental property can be challenging, but the service I received was top-notch. They listened to my requirements and found a great house that fit my budget and location preferences. The whole process was transparent and efficient.',
                'client_name' => 'Michael Chen',
                'client_profession' => 'Financial Analyst',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 4
            [
                'client_image' => 'upload/testimonial/4.jpg',
                'client_message' => 'As an investor, I need reliable and professional partners. They provided excellent insights and helped me acquire a property with great potential. Their expertise in commercial real estate is invaluable. I look forward to working with them again.',
                'client_name' => 'Sarah Johnson',
                'client_profession' => 'Investor',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 5
            [
                'client_image' => 'upload/testimonial/5.jpg',
                'client_message' => 'Selling my house was an emotional journey, but the team handled everything with care and professionalism. They marketed the property beautifully and got us a great price. I truly appreciate their dedication and hard work.',
                'client_name' => 'David Lee',
                'client_profession' => 'Retired Teacher',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 6
            [
                'client_image' => 'upload/testimonial/6.jpg',
                'client_message' => 'I’ve used their service twice now, for buying and selling. Both times, they exceeded my expectations. Their team is responsive, knowledgeable, and always puts the client first. A fantastic experience from start to finish.',
                'client_name' => 'Jessica Brown',
                'client_profession' => 'Marketing Manager',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 7
            [
                'client_image' => 'upload/testimonial/7.jpg',
                'client_message' => 'The property management service is outstanding. They take care of everything, from finding tenants to handling maintenance issues. It has made my life as a landlord so much easier. Highly recommended for anyone with rental properties.',
                'client_name' => 'Robert Green',
                'client_profession' => 'Entrepreneur',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 8
            [
                'client_image' => 'upload/testimonial/8.jpg',
                'client_message' => 'I needed to find a new office space quickly, and they delivered. They found several great options for me and helped me negotiate a fantastic deal. Their professional approach and efficiency saved me a lot of time and effort.',
                'client_name' => 'Lisa Adams',
                'client_profession' => 'Business Owner',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 9
            [
                'client_image' => 'upload/testimonial/9.jpg',
                'client_message' => 'Moving to a new city was daunting, but they helped me find a beautiful home in a safe neighborhood. Their local knowledge was a huge asset, and I am so happy with my new place. Thank you for your support!',
                'client_name' => 'Kevin Parker',
                'client_profession' => 'Accountant',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 10
            [
                'client_image' => 'upload/testimonial/10.jpg',
                'client_message' => 'I was impressed by the detailed market analysis they provided. It gave me the confidence to make an informed decision on my property purchase. They are true experts in their field.',
                'client_name' => 'Nancy Rodriguez',
                'client_profession' => 'Doctor',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 11
            [
                'client_image' => 'upload/testimonial/11.jpg',
                'client_message' => 'A wonderful experience from start to finish. They helped me sell my old home and buy a new one in the same neighborhood. The coordination was flawless. I couldn\'t be happier with the results.',
                'client_name' => 'Chris Wilson',
                'client_profession' => 'Dentist',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 12
            [
                'client_image' => 'upload/testimonial/12.jpg',
                'client_message' => 'Their team is incredibly professional and dedicated. They were always available to answer my questions and provided great advice. I felt supported throughout the entire buying process. A truly fantastic service.',
                'client_name' => 'Maria Gonzalez',
                'client_profession' => 'Chef',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 13
            [
                'client_image' => 'upload/testimonial/13.jpg',
                'client_message' => 'I was looking for a very specific type of property, and they found exactly what I was looking for. Their patience and attention to detail are second to none. I am so grateful for their help.',
                'client_name' => 'Ben Taylor',
                'client_profession' => 'Architect',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 14
            [
                'client_image' => 'upload/testimonial/14.jpg',
                'client_message' => 'The best real estate service I have ever used. They made selling my home a breeze and helped me get a price I was very happy with. I will definitely be recommending them to all my friends and family.',
                'client_name' => 'Olivia Kim',
                'client_profession' => 'Photographer',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 15
            [
                'client_image' => 'upload/testimonial/15.jpg',
                'client_message' => 'Professional, efficient, and reliable. They helped me find a great investment property with a strong rental yield. The entire transaction was smooth and well-managed. A great team to work with.',
                'client_name' => 'Alex Turner',
                'client_profession' => 'Data Scientist',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 16
            [
                'client_image' => 'upload/testimonial/16.jpg',
                'client_message' => 'They took the time to understand my family’s needs and found a home that was perfect for us. The negotiation process was handled expertly, and we felt like we were in good hands. A truly personal and professional service.',
                'client_name' => 'Sophia Evans',
                'client_profession' => 'Nurse',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 17
            [
                'client_image' => 'upload/testimonial/17.jpg',
                'client_message' => 'I was on a tight timeline to find a new rental, and they delivered. They were incredibly responsive and helped me secure a lease on a beautiful apartment in a fantastic area. I\'m so happy with their service.',
                'client_name' => 'Daniel Carter',
                'client_profession' => 'Pilot',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 18
            [
                'client_image' => 'upload/testimonial/18.jpg',
                'client_message' => 'The team provided excellent advice on how to prepare my home for sale. Their staging tips and marketing strategy were key to a quick and profitable sale. I am very impressed with their expertise.',
                'client_name' => 'Chloe Walker',
                'client_profession' => 'Interior Designer',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 19
            [
                'client_image' => 'upload/testimonial/19.jpg',
                'client_message' => 'I felt completely at ease with the entire process. They explained every document and answered all my questions patiently. It was a pleasure working with such a transparent and honest team.',
                'client_name' => 'Liam Wilson',
                'client_profession' => 'Civil Engineer',
                'status' => 1,
                'created_at' => now(),
            ],
            // Testimonial 20
            [
                'client_image' => 'upload/testimonial/20.jpg',
                'client_message' => 'They went above and beyond to help me find my dream home. The level of service and personal attention was outstanding. I couldn\'t have asked for a better experience. Highly recommend!',
                'client_name' => 'Ella Pinter',
                'client_profession' => 'Artist',
                'status' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
