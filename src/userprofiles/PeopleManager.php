<?php

namespace SharePoint\PHP\Client;

require_once('PersonProperties.php');

class PeopleManager extends ClientObject
{
    public function __construct(ClientContext $ctx)
    {
        parent::__construct($ctx,null,"sp.userprofiles.peoplemanager");
    }

    /**
     * Gets user properties for the current user.
     * @return PersonProperties
     */
    public function getMyProperties(){
        return new PersonProperties($this->getContext(),$this->getResourcePath(),"getmyproperties");
    }


    /**
     * Gets the people who are following the current user.
     * @return PersonProperties
     */
    public function getMyFollowers(){
        return new PersonProperties($this->getContext(),$this->getResourcePath(),"getmyfollowers");
    }


    /**
     * Adds the specified user to the current user's list of followed users.
     * @param $accountName
     */
    public function follow($accountName){
        $qry = new ClientQuery($this, ClientActionType::Update,"follow(@v)?@v='$accountName'");
        $this->getContext()->addQuery($qry);
    }

}