<?php
    class Panigator
    {
        private $db;
        private  $sql;
        private $total;
        private $limit;
        private $page;
        private  $data;
        public function __construct($db, $sql)
        {
            $this->db = $db;
            $this->sql = $sql;
            $res = $this->db->prepare($this->sql);
            $res->execute();

            $this->total = $res->fetchColumn();

        }

        public function getData($limit = 5, $page = 1){
            $this->limit = $limit;
            $this->page = $page;

            if ($this->limit == 'all'){
                $sql = $this->sql;
            }else{
                $sql = $this->sql. "LIMIT" . (($this->page -1) * $this->limit). ", $this->limit";

            }

            $res = $this->db->prepare($sql);
            $res->execute();
            $kq = $res->fetchAll();
            $results[] = $kq;

            $result = new Panigator();
            $result->page = $this->page;
            $result->limit = $this->limit;
            $result->total = $this->total;
            $result->page = $this->page;
            $result->data = $results;

            return$result;
        }

        public function Link($link, $link_class){
            if ($this->limit == 'all'){
                return '';
            }
            $last = ceil($this->total / $this->limit);
            $start = (($this->page - $link) > 0) ? $this->page - $link : 1;
            $end = (($this->page + link) < $last) ? $this->page + $link : $last;

            $html = '<ul class="'. $link_class . '">';
            $class = ($this->page == 1) ? "disabled" : "";
            $html .='<li class="' . $class . '"><a href="?limit=' .$this->limit. '&page=' .($this->page -1). '">&laquo;</a><li>';
            if ( $start > 1 ) {
                $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
                $html   .= '<li class="disabled"><span>...</span></li>';
            }
            for ( $i = $start ; $i <= $end; $i++ ) {
                $class  = ( $this->_page == $i ) ? "active" : "";
                $html   .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
            }
            if ( $end < $last ) {
                $html   .= '<li class="disabled"><span>...</span></li>';
                $html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
            }

            $class      = ( $this->_page == $last ) ? "disabled" : "";
            $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit. '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';
            $html       .= '</ul>';
            return $html;
        }
    }
