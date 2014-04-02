<?php
    /**
     * See info.txt
     *
     * @category      Core
     * @package       Core
     * @license       BSD License
     * @version       1.0.0.0
     * @since         2012-01-17
     * @author        Bruno Škvorc <bruno@skvorc.me>
     */
    class ExtendedModel extends CI_Model
    {
        protected $view;
        
        public function __construct()
        {
            parent::__construct();
            $this->ion_auth=new Ion_auth($this);
            
        }
    }
