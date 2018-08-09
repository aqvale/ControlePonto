<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DiaCreateRequest;
use App\Http\Requests\DiaUpdateRequest;
use App\Repositories\DiaRepository;
use App\Validators\DiaValidator;

/**
 * Class DiasController.
 *
 * @package namespace App\Http\Controllers;
 */
class DiasController extends Controller
{
    /**
     * @var DiaRepository
     */
    protected $repository;

    /**
     * @var DiaValidator
     */
    protected $validator;

    /**
     * DiasController constructor.
     *
     * @param DiaRepository $repository
     * @param DiaValidator $validator
     */
    public function __construct(DiaRepository $repository, DiaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $dias = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dias,
            ]);
        }

        return view('dias.index', compact('dias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DiaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DiaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $dium = $this->repository->create($request->all());

            $response = [
                'message' => 'Dia created.',
                'data'    => $dium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dium,
            ]);
        }

        return view('dias.show', compact('dium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dium = $this->repository->find($id);

        return view('dias.edit', compact('dium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DiaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DiaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $dium = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Dia updated.',
                'data'    => $dium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Dia deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Dia deleted.');
    }
}
