<?php

class UserTableMap extends TableMap
{
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.UserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return     void
     * @throws     PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
        $this->addColumn('LOGIN', 'Login', 'VARCHAR', true, 50, null);
        $this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 100, null);
        $this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 255, null);
        $this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 255, null);
        $this->addColumn('ROLE', 'Role', 'VARCHAR', true, 10, null);
        // validators
    }

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    }

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    }
}