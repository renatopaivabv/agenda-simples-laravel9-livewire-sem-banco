<?php

namespace App\Http\Livewire;

use Faker\Core\Number;
use Livewire\Component;

class Contacts extends Component
{
    public array $contacts = [
        [
            'name' => 'Miguel',
            'phone' => '85 9 8888-8888'
        ],
        [
            'name' => 'Gabriel',
            'phone' => '85 9 5555-5555'
        ],
    ];

    protected array $rules = [
        'name' => 'required',
        'phone' => 'required'
    ];

    public string $key = '';
    public string $name = '';
    public string $phone = '';

    public function render()
    {
        return view('livewire.contacts');
    }

    public function save()
    {

        if ($this->key != '') {
            $this->update();
        } else {
            $this->validate();

            $add = [
                'name' => $this->name,
                'phone' => $this->phone,
            ];

            array_push($this->contacts, $add);
        }
            $this->resetFields();
    }



    public function edit($key)
    {
        if (array_key_exists($key, $this->contacts)) {
            $this->key = $key;
            $this->name = $this->contacts[$key]['name'];
            $this->phone = $this->contacts[$key]['phone'];
        }
    }

    public function update()
    {
        if (array_key_exists($this->key, $this->contacts)) {
            $this->validate();
            $this->contacts[$this->key]['name'] = $this->name;
            $this->contacts[$this->key]['phone'] = $this->phone;
        }
    }

    public function del($key)
    {
        if (array_key_exists($key, $this->contacts)) {
            unset($this->contacts[$key]);
        }
    }

    private function resetFields()
    {
        $this->key = '';
        $this->name = '';
        $this->phone = '';
    }
}
