<a href="/" class="text-2xl font-bold text-primary-600 hover:opacity-75 transition-opacity">
    {{ \App\Models\Masjid::first()?->nama ?? 'Admin' }}
</a>