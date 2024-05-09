@props(['name','stat'])
<div class="bg-white shadow-md rounded-lg border border-gray-200 px-4 py-6">
        <div class="flex justify-between items-center">
        <h4 class="text-gray-500 font-medium">{{$name}}</h4>
        <select id="selectedDays" name="selectedDays" class="border bg-green-100" wire:model="selectedDays" wire:change="updateStats">
        <option value="30">30 days</option>
        <option value="60">60 days</option>
        <option value="90">90 days</option>
        </select>
        </div>
        
        <div class="font-bold text-3xl mt-4">{{$stat}}</div>
 </div>

