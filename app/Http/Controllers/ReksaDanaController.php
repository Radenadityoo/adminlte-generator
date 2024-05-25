<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReksaDanaRequest;
use App\Http\Requests\UpdateReksaDanaRequest;
use App\Repositories\ReksaDanaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;

class ReksaDanaController extends AppBaseController
{
    /** @var ReksaDanaRepository $reksaDanaRepository*/
    private $reksaDanaRepository;

    public function __construct(ReksaDanaRepository $reksaDanaRepo)
    {
        $this->reksaDanaRepository = $reksaDanaRepo;
    }

    /**
     * Display a listing of the ReksaDana.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reksaDanas = $this->reksaDanaRepository->paginate(10);

        return view('reksa_danas.index')
            ->with('reksaDanas', $reksaDanas);
    }

    /**
     * Show the form for creating a new ReksaDana.
     *
     * @return Response
     */
    public function create()
    {
        return view('reksa_danas.create');
    }

    /**
     * Store a newly created ReksaDana in storage.
     *
     * @param CreateReksaDanaRequest $request
     *
     * @return Response
     */
    public function store(CreateReksaDanaRequest $request)
    {
        $input = $request->all();

        $reksaDana = $this->reksaDanaRepository->create($input);

        Flash::success('Reksa Dana saved successfully.');

        return redirect(route('reksaDanas.index'));
    }

    /**
     * Display the specified ReksaDana.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            Flash::error('Reksa Dana not found');

            return redirect(route('reksaDanas.index'));
        }

        return view('reksa_danas.show')->with('reksaDana', $reksaDana);
    }

    /**
     * Show the form for editing the specified ReksaDana.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            Flash::error('Reksa Dana not found');

            return redirect(route('reksaDanas.index'));
        }

        return view('reksa_danas.edit')->with('reksaDana', $reksaDana);
    }

    /**
     * Update the specified ReksaDana in storage.
     *
     * @param int $id
     * @param UpdateReksaDanaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReksaDanaRequest $request)
    {
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            Flash::error('Reksa Dana not found');

            return redirect(route('reksaDanas.index'));
        }

        $reksaDana = $this->reksaDanaRepository->update($request->all(), $id);

        Flash::success('Reksa Dana updated successfully.');

        return redirect(route('reksaDanas.index'));
    }

    /**
     * Remove the specified ReksaDana from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reksaDana = $this->reksaDanaRepository->find($id);

        if (empty($reksaDana)) {
            Flash::error('Reksa Dana not found');

            return redirect(route('reksaDanas.index'));
        }

        $this->reksaDanaRepository->delete($id);

        Flash::success('Reksa Dana deleted successfully.');

        return redirect(route('reksaDanas.index'));
    }
}
