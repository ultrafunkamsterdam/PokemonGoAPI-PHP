<?php

namespace NicklasW\PkmGoApi\Api;

use NicklasW\PkmGoApi\Api\Map\Map;
use NicklasW\PkmGoApi\Api\Player\Inventory;
use NicklasW\PkmGoApi\Api\Player\Journal;
use NicklasW\PkmGoApi\Api\Player\Profile;
use NicklasW\PkmGoApi\Api\Player\CheckChallenge;
use NicklasW\PkmGoApi\Requests\VerifyChallengeRequest;
use NicklasW\PkmGoApi\Services\RequestService;

class PokemonGoApi {

    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var Inventory
     */
    protected $inventory;

    /**
     * @var Profile
     */
    protected $profile;

    /**
     * @var Journal
     */
    protected $journal;

    /**
     * @var Map
     */
    protected $map;

    /**
     * @var CheckChallenge
     */
    protected $checkChallenge;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        // Initial the Request Service
        $this->requestService = new RequestService();

        // Initialize the prerequisites
        $this->initialize();
    }

    /**
     * Returns the player inventory.
     *
     * @return Inventory
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Returns the player profile.
     *
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return Journal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Returns the map.
     *
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Returns the player checkChallenge.
     *
     * @return CheckChallenge
     */
    public function checkChallenge()
    {
        return $this->checkChallenge;
    }

    /**
     * Sends back the RECaptcha challenge token
     *
     * @param string $token The recaptcha "solved-token"
     *
     * @return bool Whether the account is now "unflagged"
     */
    public function verifyChallenge($token)
    {
        $request = new VerifyChallengeRequest($token);

        $this->getRequestService()->requestHandler()->handle($request);

        /** @var \POGOProtos\Networking\Responses\VerifyChallengeResponse $response */
        $response = $request->getData();

        return (bool) $response->getSuccess();
    }

    /**
     * @return RequestService
     */
    public function getRequestService()
    {
        return $this->requestService;
    }

    /**
     * Initialize the prerequisites.
     */
    protected function initialize()
    {
        // Initialize the inventory instance
        $this->inventory = new Inventory($this);

        // Initialize the profile instance
        $this->profile = new Profile($this);

        // Initialize the journal instance
        $this->journal = new Journal($this);

        // Initialize the map instance
        $this->map = new Map($this);

        // Initialize the checkChallenge instance
        $this->checkChallenge = new CheckChallenge($this);
    }
}

