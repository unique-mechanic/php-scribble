<button type="button" class="theme-toggle" x-data role="switch" aria-label="Dark mode" aria-checked="false" :aria-checked="$store.theme.dark" @click="$store.theme.toggle()">
    <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" x-show="!$store.theme.dark">
        <circle cx="12" cy="12" r="4" />
        <path stroke-linecap="round" d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5" />
    </svg>
    <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" x-cloak x-show="$store.theme.dark">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20.5 13A8.5 8.5 0 0 1 11 3.5 8.5 8.5 0 1 0 20.5 13Z" />
    </svg>
    <span>Dark mode</span>
    <span class="theme-track" aria-hidden="true"><span class="theme-thumb"></span></span>
</button>
