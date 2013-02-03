<?php

/*
 * This file is part of the phpRedmon project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Itkg\Bundle\PhpRedmonBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * Classe Instance
 *
 * @author Patrick Deroubaix <patrick.deroubaix@gmail.com>
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Instance 
{
    protected $id;
    protected $name;
    protected $port;
    protected $host;
    protected $databases;
    protected $logs;
    protected $working;
    protected $error;
    
    public function addDatabase(Database $database)
    {
        $database->setId($this->getDatabases()->count());
        $this->getDatabases()->add($database);
    }
    
    public function removeDatabase(Database $database) 
    {
        $this->getDatabases()->remove($database);
    }
    
    public function addLog(Log $log)
    {
        $this->getLogs()->add($log);
    }
    
    public function removeLog(Log $log)
    {
        $this->getLogs()->remove($log);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getHost()
    {
        return $this->host;
    }
    
    public function getPort()
    {
        return $this->port;
    }
    
    public function getDatabases()
    {
        if($this->databases == null) {
            $this->databases = new ArrayCollection();
        }
        return $this->databases;
    }

    public function getDatabase($id)
    {
        foreach($this->getDatabases() as $database) {
            if($database->getId() == $id) {
                return $database;
            }
        }
        
        return null;
    }
    
    public function getError()
    {
        return $this->error;
    }
    
    public function getLogs()
    {
        if($this->logs == null) {
            $this->logs = new ArrayCollection();
        }
        
        return $this->logs;
    }
    
    public function isWorking()
    {
        return $this->working;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setHost($host)
    {
        $this->host = $host;
    }
    
    public function setPort($port)
    {
        $this->port = $port;
    }
    
    public function setDatabases(ArrayCollection $databases)
    {
        $this->databases = $databases;
    }
 
    public function setError($error)
    {
        $this->error = $error;
    }
    
    public function setLogs(ArrayCollection $logs)
    {
        $this->logs = $logs;
    }
    
    public function setWorking($working) 
    {
        $this->working = $working;
    }
}