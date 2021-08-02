<?php

namespace App\Repository;
use App\Models\Models\Ticket;
use App\Service\SolutionService;
use Symfony\Component\VarDumper\Cloner\Data;

class TicketRepository
{
    private $ticket;
    private $solution;
    
    function __construct()
    {
        $this->ticket = new Ticket;
        $this->solution = new SolutionService;
    }
    
    public function getAllTickets()
    {
        return $this->ticket->all()->sortByDesc('id');
    }
    
    public function getUserTickets($userId)
    {
        return $this->ticket->where(['user_id' => $userId])->get()->sortByDesc('id');
    }

    public function getTicketById($id)
    {
       return $this->ticket->where('id', $id)->with('image')->get();
    }

    public function saveTicket($ticketData)
    {
        return $this->ticket->create($ticketData);
    } 

    public function updateTicket($data, $id)
    {
        return $this->ticket->where('id', $id)->update($data);
    }

    public function updateTicketByEmail($data, $email)
    {
        return $this->ticket->where('email', $email)->update($data);
    }

    public function closeTicket($id)
    {
        $data  = [
            'status' => 'resolvido',
            'support_id' => auth()->user()->id,
            'support_email' => auth()->user()->email
        ];
        
        $this->ticket->where('id', $id)->update($data['status']);
    }

    public function deleteTicket($id)
    {
        return $this->ticket->find($id)->delete();
    }

    public function generateTicketCode()
    {
       return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
    }

    public function getTicketByYourCode($ticketCode)
    {
        return $this->ticket->where('ticket_id', $ticketCode)->first();
    }

}