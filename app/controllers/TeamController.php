<?php
class TeamController extends Controller {
    public function index() {
        $teamModel = $this->model('Team');
        $members = $teamModel->getAllMembers();
        
        $data = [
            'title' => 'Team - ' . APP_NAME,
            'members' => $members
        ];
        
        $this->view('team/index', $data);
    }
}