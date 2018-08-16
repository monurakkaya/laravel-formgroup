##Installation

`$ composer require monurakkaya/laravel-formgroup`

##Usage

Text Input: 

```php
    @formgroup([
        'type' => 'text',
        'name' => 'color',
        'required' => true
    ])
    Color
    @endformgroup
```

It will generate below html code : 

```html
        <div class="form-group">
            <label><strong>Color</strong></label>
            <input type="text" name="color" class="form-control" required="" value="">
        </div>
```
![Text](http://monurakkaya.com/laravel-formgroup/text.png)

***
DateTime Input:
```php
    @formgroup([
        'name' => 'start_at',
        'type' => 'datetime'
    ])
    Alis Tarihi
    @endformgroup
```
It will generate a datetime picker: 

![DateTime](http://monurakkaya.com/laravel-formgroup/datetime.png)
