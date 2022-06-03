<?php

namespace App\Jobs\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private  $email;
    private $orderId;

    public function __construct($email, $orderId)
    {
        $this->email = $email;
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = Order::query()->with(['customerOrder', 'productOrder'])->find($this->orderId);
        $data = [
            'name' => $order->name ?? '',
            'customerName' => $order->customerOrder->name ?? '',
            'personId' => $order->customerOrder->person_id ?? '',
            'phone' => $order->customerOrder->phone ?? '',
            'address' => $order->customerOrder->address ?? '',
            'permanentResidence' => $order->customerOrder->permanent_residence ?? '',
            'code' => $order->code ?? '',
            'statusText' => $order->statusText ?? 0,
            'priceDeposits' => $order->price_deposits ?? 0,
            'pickDateText' => $order->pickDateText ?? '',
            'dropDateText' => $order->dropDateText ?? '',
            'totalPrice' => $order->totalPrice ?? 0,
            'totalHours' => $order->totalHours ?? 0,
            'productName' => $order->productOrder->name ?? '',
            'color' => $order->productOrder->color ?? '',
            'km' => $order->productOrder->km ?? '',
            'year' => $order->productOrder->year ?? '',
            'price' => $order->productOrder->price ?? '',
            'thumbnail' => $order->productOrder->thumnail ?? '',
            'productId' => $order->productOrder->product_id ?? '',
            'licensePlates' => $order->productOrder->license_plates ?? '',
            'statusOrder' => $order->status ?? 0,
            'noteCanceled' => $order->note_cancel,
            'note' => $order->note,
            'contract' => $order->contract,
            'depositPrice' => $order->productOrder->deposit_price,
        ];

//        $email = $this->email;
        $email = 'minhhl298.st@gmail.com';

        Mail::send('mail.order', $data, function ($message) use ($email) {
            $message->to($email)->subject('Booking Car - Thông báo đặt xe thành công');
        });
    }
}
