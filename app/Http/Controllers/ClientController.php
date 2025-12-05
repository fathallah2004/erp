<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of clients
     */
    public function index()
    {
        // Mock data for demonstration
        $clients = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+1 234-567-8900',
                'company' => 'Acme Corporation',
                'status' => 'Active',
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '+1 234-567-8901',
                'company' => 'Tech Solutions Inc',
                'status' => 'Active',
                'created_at' => '2024-02-20'
            ],
            [
                'id' => 3,
                'name' => 'Robert Johnson',
                'email' => 'robert.j@example.com',
                'phone' => '+1 234-567-8902',
                'company' => 'Global Enterprises',
                'status' => 'Inactive',
                'created_at' => '2024-03-10'
            ]
        ];

        return view('clients.index', compact('clients'));
    }

    /**
     * Display the specified client profile
     */
    public function show($id)
    {
        // Mock data for demonstration
        $client = [
            'id' => $id,
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1 234-567-8900',
            'company' => 'Acme Corporation',
            'address' => '123 Main Street, City, State 12345',
            'status' => 'Active',
            'created_at' => '2024-01-15',
            'last_interaction' => '2024-03-25',
            'total_orders' => 15,
            'total_revenue' => 125000
        ];

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client
     */
    public function edit($id)
    {
        // Mock data for demonstration
        $client = [
            'id' => $id,
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1 234-567-8900',
            'company' => 'Acme Corporation',
            'address' => '123 Main Street, City, State 12345',
            'status' => 'Active'
        ];

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client information
     */
    public function update(Request $request, $id)
    {
        // In a real application, you would validate and update the database here
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive,Pending'
        ]);

        // Mock success response
        return redirect()->route('clients.show', $id)
            ->with('success', 'Client information updated successfully!');
    }

    /**
     * Submit interaction or feedback
     */
    public function submitInteraction(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:Interaction,Feedback',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'date' => 'required|date'
        ]);

        // In a real application, you would save this to the database
        return redirect()->route('clients.show', $id)
            ->with('success', 'Interaction/Feedback submitted successfully!');
    }

    /**
     * Submit complaint or support request
     */
    public function submitComplaint(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:Complaint,Support Request',
            'priority' => 'required|in:Low,Medium,High,Urgent',
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'date' => 'required|date'
        ]);

        // In a real application, you would save this to the database
        return redirect()->route('clients.show', $id)
            ->with('success', 'Complaint/Support request submitted successfully!');
    }

    /**
     * Display client insights
     */
    public function insights($id)
    {
        // Mock data for demonstration
        $client = [
            'id' => $id,
            'name' => 'John Doe',
            'company' => 'Acme Corporation'
        ];

        $insights = [
            'total_interactions' => 45,
            'total_complaints' => 3,
            'total_support_requests' => 12,
            'average_response_time' => '2.5 hours',
            'satisfaction_score' => 4.5,
            'revenue_trend' => [
                'Jan' => 15000,
                'Feb' => 18000,
                'Mar' => 22000,
                'Apr' => 25000,
                'May' => 28000,
                'Jun' => 30000
            ],
            'interaction_trend' => [
                'Jan' => 5,
                'Feb' => 7,
                'Mar' => 8,
                'Apr' => 9,
                'May' => 10,
                'Jun' => 6
            ]
        ];

        return view('clients.insights', compact('client', 'insights'));
    }
}

