<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReksaDanaAPIRequest;
use App\Http\Requests\API\UpdateReksaDanaAPIRequest;
use App\Models\ReksaDana;
use App\Repositories\ReksaDanaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ReksaDanaController
 * @package App\Http\Controllers\API
 */

class ReksaDanaAPIController extends AppBaseController
{
    /** @var  ReksaDanaRepository */
    private $reksaDanaRepository;

    public function __construct(ReksaDanaRepository $reksaDanaRepo)
    {
        $this->reksaDanaRepository = $reksaDanaRepo;
    }

    /**
     * Display a listing of the ReksaDana.
     * GET|HEAD /reksaDanas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $reksaDanas = $this->reksaDanaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($reksaDanas->toArray(), 'Reksa Danas retrieved successfully');
    }

    /**
     * Store a newly created ReksaDana in storage.
     * POST /reksaDanas
     *
     * @param CreateReksaDanaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReksaDanaAPIRequest $request)
    {
        $input = $request->all();

        $reksaDana = $this->reksaDanaRepository->create($input);

        return $this->sendResponse($reksaDana->toArray(), 'Reksa Dana saved successfully');
    }

    /**
     * Display the specified ReksaDana.
     * GET|HEAD /reksaDanas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ReksaDana $reksaDana */
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            return $this->sendError('Reksa Dana not found');
        }

        return $this->sendResponse($reksaDana->toArray(), 'Reksa Dana retrieved successfully');
    }

    /**
     * Update the specified ReksaDana in storage.
     * PUT/PATCH /reksaDanas/{id}
     *
     * @param int $id
     * @param UpdateReksaDanaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReksaDanaAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReksaDana $reksaDana */
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            return $this->sendError('Reksa Dana not found');
        }

        $reksaDana = $this->reksaDanaRepository->update($input, $id);

        return $this->sendResponse($reksaDana->toArray(), 'ReksaDana updated successfully');
    }

    /**
     * Remove the specified ReksaDana from storage.
     * DELETE /reksaDanas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ReksaDana $reksaDana */
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            return $this->sendError('Reksa Dana not found');
        }

        $reksaDana->delete();

        return $this->sendSuccess('Reksa Dana deleted successfully');
    }
}
