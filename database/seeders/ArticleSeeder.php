<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Penerapan Artificial Intelligence dalam Industri Modern.',
                'slug' => 'penerapan-artificial-intelligence-dalam-industri-modern',
                'category' => 'Artificial Intelligence',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'Artificial Intelligence (AI) telah merevolusi berbagai sektor industri modern, mulai dari otomasi lini produksi hingga analisis prediktif berbasis machine learning.',
                'content' => "Artificial Intelligence (AI) kini bukan lagi sekadar wacana masa depan, melainkan kebutuhan nyata yang mendorong efisiensi dan keunggulan kompetitif di berbagai sektor industri.\n\nDalam lanskap industri manufaktur, implementasi predictive maintenance berbasis sensor IoT dan AI memungkinkan deteksi kerusakan mesin sebelum terjadi downtime yang merugikan. Selain itu, computer vision digunakan untuk otomatisasi quality control dengan akurasi yang jauh melampaui inspeksi manual.\n\nDi bidang operasional bisnis, AI Agent dan Large Language Models (LLM) membantu mengotomatiskan alur kerja dokumen, analisis data penjualan, serta pelayanan pelanggan 24/7 secara personal dan responsif.\n\nMelalui pelatihan di CV. SMARTPLUS INDONESIA, peserta diajarkan bagaimana mengintegrasikan AI langsung ke alur kerja praktis, mempersiapkan talenta digital untuk siap kerja di era transformasi digital.",
                'author' => 'Tim SMARTPLUS',
                'status' => 'Published',
                'views' => 125,
            ],
            [
                'title' => 'Membangun Prototype IoT Menggunakan Microcontroller ESP32.',
                'slug' => 'membangun-prototype-iot-menggunakan-microcontroller-esp32',
                'category' => 'Internet of Things',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'ESP32 adalah mikrokontroler andalan dalam dunia IoT karena telah dilengkapi modul WiFi dan Bluetooth dengan harga yang terjangkau dan performa tinggi.',
                'content' => "Microcontroller ESP32 telah menjadi standar de facto bagi para engineer dan pengembang IoT di seluruh dunia. Berkat prosesor dual-core bertenaga dan konektivitas WiFi serta Bluetooth terintegrasi, ESP32 sangat ideal untuk berbagai skenario proyek cerdas.\n\nBeberapa langkah penting dalam memulai prototype IoT dengan ESP32:\n1. Pemilihan Sensor: Menggunakan sensor DHT22 untuk suhu & kelembaban, sensor PIR untuk gerak, atau sensor arus untuk monitoring energi.\n2. Protokol Komunikasi: Memanfaatkan protokol MQTT yang ringan dan cepat untuk komunikasi data real-time dengan server broker.\n3. Integrasi Cloud Dashboard: Menampilkan visualisasi data sensor di platform seperti ThingsBoard, Adafruit IO, atau dashboard kustom.\n\nDi CV. SMARTPLUS INDONESIA, Anda akan mempraktikkan langsung perakitan hardware, coding firmware, hingga deployment dashboard interaktif.",
                'author' => 'Instruktur IoT',
                'status' => 'Published',
                'views' => 98,
            ],
            [
                'title' => 'Otomasi Workflow Bisnis Berbasis Agentic AI dan N8N.',
                'slug' => 'otomasi-workflow-bisnis-berbasis-agentic-ai-dan-n8n',
                'category' => 'Agentic AI',
                'image' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'Pelajari cara menyambungkan Agentic AI dengan N8N untuk mengotomatiskan pekerjaan berulang dalam operasional bisnis tanpa ribet.',
                'content' => "Otomasi alur kerja (workflow automation) berkembang pesat dengan hadirnya Agentic AI. Berbeda dari otomasi sederhana yang kaku mengikuti aturan tetap, Agentic AI memiliki kemampuan reasoning, pengambilan keputusan dinamis, serta integrasi multi-tools.\n\nN8N sebagai platform otomasi alur kerja visual open-source memberikan fleksibilitas luar biasa untuk menghubungkan webhook, database, API eksternal, dan modul AI LLM secara aman on-premise maupun di cloud.\n\nContoh implementasi praktis:\n- Lead processing otomatis: Menganalisis pesan masuk WhatsApp/Email menggunakan AI, mengekstrak data penting, dan menyimpannya ke CRM otomatis.\n- Pembuatan laporan berkala: Merangkum metrik performa mingguan dan mengirimkan laporannya ke Slack/Telegram tim manajemen.\n\nProgram pelatihan Agentic AI kami dirancang membekali peserta dengan skill praktis membangun workflow otonom yang siap diimplementasikan di dunia kerja.",
                'author' => 'Tim SMARTPLUS',
                'status' => 'Published',
                'views' => 142,
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }
    }
}
