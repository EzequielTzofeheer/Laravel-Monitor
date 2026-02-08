<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="md:col-span-1">
        <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
        <input type="url" id="url" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('url') border-red-500 border-2 @else border-gray-300 @enderror" wire:model.defer="url"/>
        @error('url')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror
    </div>

</div> <!-- grid grid-cols-1 md:grid-cols-3 gap-6 -->
