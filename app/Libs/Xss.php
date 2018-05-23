<?php
    /**
     * function to remove xss
     *
     * @param DOM $html
     * @return DOM $html
     */
    function clean_xss($html){
        return preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
    }