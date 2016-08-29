<?php defined("BASEPATH") or exit('No direct script access allowed');

class Ads extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ad_model');
        $this->load->library(array('pagination', 'submission_library', 'contest_library', 'email_library', 'user_library'));
    }

    public function index()
    {
        $data        = array();
        $data['ads'] = $this->ad_model->by_company()->fetch()->result();

        $config['base_url']    = base_url('ads/index');
        $config['total_rows']  = count($data['ads']);
        $config['per_page']    = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('ads/index', $data);
    }

    public function import()
    {
        $data             = array('not_found' => array(), 'found' => array(), 'msg' => '', 'cids' => array(), 'cids' => array());
        $post             = $this->input->post();
        $post['csv_data'] = isset($post['csv_data']) ? $post['csv_data'] : '';
        $data['post']     = $post;

        try {
            if ($post['csv_data']) {
                $post['csv_data_array'] = json_decode($post['csv_data'], true);
                if (!$post['csv_data_array']) {
                    throw new Exception("no csv data");
                }
                foreach ($post['csv_data_array'] as $row) {
                    if ($row['submission id'] && $row['CTR (All)']) {
                        $submission = $this->submission_library->get($row['submission id']);
                        if (!$submission) {
                            $data['not_found'][] = $row['submission id'];
                        } else {
                            $temp = array(
                                'sid'             => $submission->id,
                                'ctr'             => number_format(round($row['CTR (All)'], 2), 2),
                                'impressions'     => $row['Impressions'],
                                'cost_per_result' => number_format(round($row['Cost per Result (USD)'], 2), 2),
                                'results'         => $row['Results'],
                            );
                            $data['found'][]                       = $temp;
                            $data['cids'][$submission->contest_id] = $submission->contest_id;
                        }
                    }
                }

                if ($post['import_act'] == 'import') {
                    $sids = array();
                    foreach ($data['found'] as $row) {
                        $sid = $row['sid'];
                        $this->submission->update($sid, array('test_result' => serialize($row)));
                        $sids[] = $sid;
                    }

                    $add_msg = '';
                    foreach ($data['cids'] as $contest_id) {
                        $contest    = $this->contest_library->select('*')->where('id', $contest_id)->fetch()->row();
                        $user       = $this->user_library->get($contest->owner, false);
                        $data_email = [
                            'queued_at'      => time(),
                            'sent_at'        => null,
                            'failure_reason' => null,
                            'recipient'      => $user->email,
                            'recipient_id'   => $contest->owner,
                            'email_type'     => 'pending_purchase',
                            'object_type'    => 'contest',
                            'object_id'      => $contest->id,
                            'opened'         => 0,
                            'clicks'         => 0,
                        ];
                        $this->email_library->create($data_email);
                        $this->contest_library->update($contest_id, array('test_upload_time' => date('Y-m-d H:i:s')));
                        $add_msg .= ' contest #' . $contest_id . ' pending_purchase, ';
                    }
                    throw new Exception("submission " . implode(',', $sids) . " updated. " . $add_msg);
                }
                //var_dump($post);
            }

        } catch (Exception $e) {
            $data['msg'] = $e->getMessage();
        }

        $this->load->view('ads/import', $data);
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
