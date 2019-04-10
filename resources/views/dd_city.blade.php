    
    @foreach ($city as $item)
        
    <option value="{{ $item->city_name}}">{{ $item->city_name }}</option>
    
    @endforeach
    