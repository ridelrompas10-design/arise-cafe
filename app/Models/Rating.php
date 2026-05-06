public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function product()
{
    return $this->belongsTo(Product::class);
}

public function transactionDetail()
{
    return $this->belongsTo(TransactionDetail::class);
}