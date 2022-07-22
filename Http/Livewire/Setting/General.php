<?php

namespace Modules\Core\Http\Livewire\Setting;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;
use Modules\Core\Models\Setting;

class General extends Component
{
    use LoadLayoutView;
    use WatchLanguageChange;

    public $viewPath = 'core::livewire.setting.general';

    public $setting = [];

    protected $rules = [
        'setting.site_name' => 'required',
        'setting.site_description' => '',
        'setting.site_keywords' => '',
        'setting.site_email' => '',
        'setting.site_phone' => '',
        'setting.site_address' => '',
        'setting.site_map' => '',
        'setting.site_google_analytics' => '',
    ];

    protected $listeners = ['languageSwitched'];

    public function languageSwitched()
    {
        $this->fetchLocale();
        $this->resetState();
    }

    public function hydrate()
    {
        $this->applyLocale();
    }

    public function mount()
    {
        $this->resetState();
    }

    public function resetState()
    {
        $generalSetting = collect($this->rules)
            ->keys()
            ->map(fn (string $setting) => Str::replaceFirst('setting.', '', $setting))
            ->toArray();
        $this->setting = Setting::query()
            ->whereIn('key', $generalSetting)
            ->get(['key', 'value'])
            ->keyBy('key')
            ->map->getValue()
            ->toArray();
    }

    public function save()
    {
        $this->validate($this->rules);

        foreach ($this->setting as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $this->dispatchBrowserEvent('success', ['message' => __('Setting saved successfully')]);
    }
}
