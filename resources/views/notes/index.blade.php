@extends('layouts.cyber')
@section('title', 'Note Database')

@section('content')
<main class="scanlines grid-lines min-h-screen">
    <div class="mx-auto w-full max-w-7xl py-4 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 h-full">

            {{-- LEFT SIDEBAR --}}
            <div class="skills-sidebar rounded-none lg:col-span-1 p-4">
                <div class="mb-6">
                    <h3 class="text-cyan-400 text-xs font-bold uppercase tracking-widest mb-3">▸ NOTE STATS</h3>
                    <div class="space-y-3">
                        <div class="total-stats p-3 rounded-none">
                            <div class="skill-stat">Total Notes</div>
                            <div class="text-2xl font-bold glow-cyan">{{ count($notes) }}</div>
                        </div>
                        <div class="total-stats p-3 rounded-none">
                            <div class="skill-stat">Total Characters</div>
                            <div class="text-2xl font-bold glow-cyan">{{ $notes->sum(fn($n) => strlen($n->body)) }}</div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-cyan-400 pt-4">
                    <h3 class="text-cyan-400 text-xs font-bold uppercase tracking-widest mb-4">▸ CATEGORIES</h3>
                    <div class="space-y-2">
                        <div class="skill-category active" onclick="filterNotes('all')">
                            <span class="text-cyan-400 font-bold">ALL NOTES</span>
                            <div class="skill-bar"><div class="skill-bar-fill" style="width:100%"></div></div>
                        </div>
                        <div class="skill-category" onclick="filterNotes('short')">
                            <span class="text-gray-400">SHORT (&lt;50)</span>
                            <div class="skill-bar"><div class="skill-bar-fill" style="width:{{ $notes->count() > 0 ? $notes->filter(fn($n) => strlen($n->body) < 50)->count() / $notes->count() * 100 : 0 }}%"></div></div>
                        </div>
                        <div class="skill-category" onclick="filterNotes('medium')">
                            <span class="text-gray-400">MEDIUM (50-200)</span>
                            <div class="skill-bar"><div class="skill-bar-fill" style="width:{{ $notes->count() > 0 ? $notes->filter(fn($n) => strlen($n->body) >= 50 && strlen($n->body) <= 200)->count() / $notes->count() * 100 : 0 }}%"></div></div>
                        </div>
                        <div class="skill-category" onclick="filterNotes('long')">
                            <span class="text-gray-400">LONG (&gt;200)</span>
                            <div class="skill-bar"><div class="skill-bar-fill" style="width:{{ $notes->count() > 0 ? $notes->filter(fn($n) => strlen($n->body) > 200)->count() / $notes->count() * 100 : 0 }}%"></div></div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-cyan-400">
                    <a href="{{ route('notes.create') }}" class="btn-cyber px-4 py-2 rounded-none w-full text-center block text-sm">
                        ➜ NEW NOTE
                    </a>
                </div>
            </div>

            {{-- NOTES GRID --}}
            <div class="lg:col-span-3 pr-4">
                <div class="mb-4">
                    <h2 class="text-3xl font-bold glow-magenta mb-2">▸ NOTE DATABASE</h2>
                    <div class="h-1 w-40 bg-gradient-to-r from-pink-600 to-transparent"></div>
                </div>

                @if($notes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="notes-container">
                    @foreach($notes as $note)
                    <a href="{{ route('notes.show', $note) }}" class="group note-card" data-length="{{ strlen($note->body) }}">
                        <div class="skill-card p-6 rounded-none h-full">
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-sm glow-cyan group-hover:text-pink-400 transition-all duration-300 line-clamp-2 flex-1">
                                    ▸ {{ Str::limit($note->body, 45) }}
                                </h3>
                                <span class="skill-stat ml-2 flex-shrink-0">ID{{ $note->id }}</span>
                            </div>
                            <p class="text-xs text-gray-400 line-clamp-2 mb-4">{{ Str::limit($note->body, 80) }}...</p>
                            <div class="border-t border-cyan-400 pt-3 space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="skill-stat">LENGTH</span>
                                    <span class="skill-stat-value">{{ strlen($note->body) }} CH</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="skill-stat">CREATED</span>
                                    <span class="skill-stat-value text-xs">{{ $note->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="skill-bar mt-3">
                                    <div class="skill-bar-fill" style="width:{{ min(strlen($note->body) / 10, 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="skill-card p-8 rounded-none text-center neon-border">
                    <p class="text-cyan-400 mb-4 font-mono text-lg">[NO DATA DETECTED]</p>
                    <p class="text-gray-400 mb-6">The database is empty. Create your first note to begin.</p>
                    <a href="{{ route('notes.create') }}" class="btn-cyber px-8 py-3 rounded-none inline-block">➜ CREATE FIRST NOTE</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

@push('scripts')
<script>
function filterNotes(category) {
    const cards = document.querySelectorAll('.note-card');
    const cats  = document.querySelectorAll('.skill-category');
    cats.forEach((c, i) => {
        c.classList.remove('active');
        if ((category==='all'&&i===0)||(category==='short'&&i===1)||(category==='medium'&&i===2)||(category==='long'&&i===3)) c.classList.add('active');
    });
    let visible = 0;
    cards.forEach(card => {
        const len = parseInt(card.dataset.length);
        const show = category==='all' || (category==='short'&&len<50) || (category==='medium'&&len>=50&&len<=200) || (category==='long'&&len>200);
        card.style.display = show ? 'block' : 'none';
        if(show) visible++;
    });
    const container = document.getElementById('notes-container');
    const existing  = document.getElementById('no-match-msg');
    if(!visible && container && !existing) {
        const msg = document.createElement('div');
        msg.id = 'no-match-msg';
        msg.className = 'skill-card p-8 rounded-none text-center neon-border col-span-full';
        msg.innerHTML = '<p class="text-cyan-400 font-mono">[NO NOTES IN THIS CATEGORY]</p>';
        container.appendChild(msg);
    } else if(visible && existing) existing.remove();
}
</script>
@endpush
@endsection
