<?php

interface InterfaceCommand {

    public function configure();
    public function execute();
    public function help();
    
}