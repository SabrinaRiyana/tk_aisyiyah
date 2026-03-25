<x-filament-panels::page>

    {{-- Greeting --}}
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #059669;">
            {{ $greeting }}, {{ auth()->user()->name }}!
        </h2>
    </div>

    {{-- Top Row --}}
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1rem;">

        {{-- Banner --}}
        <div style="border-radius: 1rem; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); height: 180px; background: #d1fae5;">
            @php $banner = \App\Models\Banner::first(); @endphp
            @if($banner && $banner->image)
                <img src="{{ Storage::url($banner->image) }}" style="width:100%; height:100%; object-fit:cover;" alt="Banner">
            @else
                <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:#059669; font-weight:600;">
                    TK Aisyiyah
                </div>
            @endif
        </div>

        {{-- PPDB Stats --}}
        <div style="border-radius: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); background: white; padding: 1rem;">
            @php
                $years = collect(range(date('Y') - 5, date('Y')));
                $ppdbData = $years->map(fn($y) => [
                    'year' => $y,
                    'count' => \App\Models\PpdbRegistration::whereYear('created_at', $y)->count(),
                ]);
                $maxCount = $ppdbData->max('count') ?: 1;
            @endphp
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                <span style="font-weight:600; font-size:0.875rem; color:#374151;">
                    {{ date('Y') - 5 }}-{{ date('Y') }} PPDB Stats
                </span>
                <a href="{{ route('filament.admin.resources.ppdb-registrations.index') }}"
                   style="font-size:0.75rem; color:#059669; text-decoration:none;">Lihat &rsaquo;</a>
            </div>
            <div style="display:flex; align-items:flex-end; gap:4px; height:100px;">
                @foreach($ppdbData as $data)
                    @php $h = max(($data['count'] / $maxCount) * 100, 5); @endphp
                    <div style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:flex-end; height:100%;">
                        <div style="width:100%; border-radius:4px 4px 0 0; background:#6ee7b7; height:{{ $h }}%;"></div>
                        <span style="font-size:9px; color:#9ca3af; margin-top:2px;">{{ substr($data['year'], 2) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Quick Links --}}
        <div style="display:grid; grid-template-rows: 1fr 1fr; gap:0.75rem;">
            <a href="{{ route('filament.admin.resources.fasilitas.index') }}"
               style="border-radius:1rem; background:#059669; color:white; padding:1rem; display:flex; flex-direction:column; justify-content:space-between; text-decoration:none; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                <span style="font-size:0.75rem; opacity:0.8;">Edit Fasilitas &rsaquo;</span>
                <span style="font-size:1.25rem; font-weight:700; letter-spacing:0.05em;">FASILITAS</span>
            </a>
            <a href="{{ route('filament.admin.resources.teachers.index') }}"
               style="border-radius:1rem; background:#065f46; color:white; padding:1rem; display:flex; flex-direction:column; justify-content:space-between; text-decoration:none; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                <span style="font-size:0.75rem; opacity:0.8;">Edit Staff &rsaquo;</span>
                <span style="font-size:0.875rem; font-weight:700; line-height:1.3;">STAFF PENGAJAR &<br>TENAGA KEPENDIDIKAN</span>
            </a>
        </div>
    </div>

    {{-- Recent Reviews --}}
    <div style="background:white; border-radius:1rem; box-shadow:0 2px 8px rgba(0,0,0,0.1); padding:1rem; margin-bottom:1rem;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
            <span style="font-weight:600; color:#374151;">Recent Reviews</span>
            <a href="{{ route('filament.admin.resources.suggestions.index') }}"
               style="font-size:0.75rem; color:#059669; text-decoration:none;">See more &rsaquo;</a>
        </div>
        @php $reviews = \App\Models\Suggestion::latest()->take(5)->get(); @endphp
        <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
            @forelse($reviews->take(3) as $review)
                <span style="background:#f3f4f6; color:#4b5563; font-size:0.75rem; border-radius:9999px; padding:0.25rem 0.75rem;">
                    &#64;{{ $review->name ?? 'Anonim' }}: {{ Str::limit($review->message ?? '-', 35) }}
                </span>
            @empty
                <span style="color:#9ca3af; font-size:0.875rem;">Belum ada ulasan.</span>
            @endforelse
            @if($reviews->count() > 3)
                <span style="background:#e5e7eb; color:#6b7280; font-size:0.75rem; border-radius:9999px; padding:0.25rem 0.75rem;">
                    {{ $reviews->count() - 3 }}+ more
                </span>
            @endif
        </div>
    </div>

    {{-- Bottom Row --}}
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">

        {{-- Upcoming Events --}}
        <div style="background:white; border-radius:1rem; box-shadow:0 2px 8px rgba(0,0,0,0.1); padding:1rem;">
            <h3 style="font-weight:600; color:#374151; margin-bottom:0.75rem; font-size:0.9rem;">
                {{ now()->translatedFormat('F') }} Upcoming Event
            </h3>
            <table style="width:100%; font-size:0.8rem; border-collapse:collapse;">
                <thead>
                    <tr style="color:#9ca3af; font-size:0.75rem; border-bottom:1px solid #e5e7eb;">
                        <th style="padding-bottom:0.5rem; text-align:left; width:40px;">Date</th>
                        <th style="padding-bottom:0.5rem; text-align:left;">Event name</th>
                        <th style="padding-bottom:0.5rem; text-align:right;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding:0.5rem 0; color:#9ca3af;">—</td>
                        <td style="padding:0.5rem 0; color:#6b7280;">Belum ada event bulan ini</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Customer Reviews Chart --}}
        <div style="background:white; border-radius:1rem; box-shadow:0 2px 8px rgba(0,0,0,0.1); padding:1rem;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                <span style="font-weight:600; color:#374151; font-size:0.9rem;">{{ date('Y') }} Customer Reviews</span>
                <a href="{{ route('filament.admin.resources.suggestions.index') }}"
                   style="font-size:0.75rem; color:#059669; text-decoration:none;">See more &rsaquo;</a>
            </div>
            @php
                $months = ['Aug','Sep','Oct','Nov','Dec','Jan'];
                $monthNums = [8, 9, 10, 11, 12, 1];
                $reviewCounts = collect($monthNums)->map(fn($m) =>
                    \App\Models\Suggestion::whereMonth('created_at', $m)->count()
                );
                $maxR = $reviewCounts->max() ?: 1;
            @endphp
            <div style="display:flex; align-items:flex-end; gap:8px; height:80px;">
                @foreach($months as $i => $month)
                    @php
                        $h = max(($reviewCounts[$i] / $maxR) * 100, 5);
                        $color = ($i === count($months) - 1) ? '#059669' : '#6ee7b7';
                    @endphp
                    <div style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:flex-end; height:100%;">
                        <div style="width:100%; border-radius:4px 4px 0 0; background:{{ $color }}; height:{{ $h }}%;"></div>
                        <span style="font-size:9px; color:#9ca3af; margin-top:2px;">{{ $month }}</span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-filament-panels::page>