<div>
    {!! QrCode::size(150)->generate(asset('storage/' . $barcode->link)) !!}
</div>