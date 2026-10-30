<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductInquiryController extends Controller
{
    // Save a buyer's inquiry
    public function store(Request $request, Product $product)
    {
        // Prevent buyers from inquiring about their own products
        if ($product->user_id == Auth::id()) {
            return back()->with(
                'error',
                'You cannot inquire about your own product.'
            );
        }

        // Only allow inquiries about available products
        if ($product->status !== 'Available') {
            return back()->with(
                'error',
                'This product is no longer available.'
            );
        }

        // Prevent duplicate pending inquiries for the same product
        $existingInquiry = ProductInquiry::where('product_id', $product->id)
            ->where('buyer_id', Auth::id())
            ->where('status', 'Pending')
            ->exists();

        if ($existingInquiry) {
            return back()->with(
                'error',
                'You already have a pending inquiry for this product.'
            );
        }

        // Save the inquiry and notify the seller through their dashboard
        ProductInquiry::create([
            'product_id' => $product->id,
            'buyer_id' => Auth::id(),
            'seller_id' => $product->user_id,
            'message' => 'I am interested in this product. Please contact me.',
            'status' => 'Pending',
        ]);

        return back()->with(
            'success',
            'Your inquiry has been sent to the seller!'
        );
    }

    // Display inquiries received by the logged-in seller
    public function sellerInquiries()
    {
        $inquiries = ProductInquiry::with(['product', 'buyer'])
            ->where('seller_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('inquiries.seller', compact('inquiries'));
    }

    // Display inquiries submitted by the logged-in buyer
    public function myInquiries()
    {
        $inquiries = ProductInquiry::with(['product', 'seller'])
            ->where('buyer_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('inquiries.buyer', compact('inquiries'));
    }

    //Complete an inquiry (mark as completed) by the seller
    public function complete(ProductInquiry $inquiry)
{
    // Make sure the logged-in seller owns this inquiry
    if ($inquiry->seller_id != Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Only pending inquiries can be completed
    if ($inquiry->status !== 'Pending') {
        return back()->with('error', 'This inquiry is already completed.');
    }

    // Update inquiry status
    $inquiry->update([
        'status' => 'Completed'
    ]);

    return back()->with(
        'success',
        'Inquiry marked as completed!'
    );
}
}