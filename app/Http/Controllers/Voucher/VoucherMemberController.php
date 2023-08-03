<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Amenability;
use App\Models\MemberVoucher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class VoucherMemberController extends Controller
{
    public function index()
    {
        $data = [
            'users'   => User::with('estate', 'memberType')
                ->where('role_id', 4)
                ->where('outlet_id', Auth::user()->outlet_id)
                ->get(),
            'member_vouchers'    => MemberVoucher::with('users.estate')->where('status', '1')->get(),
        ];
        return view('page.voucher.voucher-member', $data);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'member_id' => 'required',
                'wife'      => 'required',
                'child'     => 'required',
            ]);

            $member_id  = $request->member_id;
            $employee    = 1;
            $wife       = $request->wife;
            $child      = $request->child;

            $amenability_employee = Amenability::where([['name', 'Pekerja'], ['status', '1']])->first()->limit;
            $amenability_wife = Amenability::where([['name', 'Istri'], ['status', '1']])->first()->limit;
            $amenability_child = Amenability::where([['name', 'Anak'], ['status', '1']])->first()->limit;

            $total_amenability_employee = $amenability_employee * $employee;
            $total_amenability_wife = $amenability_wife * $wife;
            $total_amenability_child = $amenability_child * $child;
            $total_amenability = $total_amenability_employee + $total_amenability_wife + $total_amenability_child;

            $member_voucher = new MemberVoucher();
            $member_voucher->member_id  = $member_id;
            $member_voucher->employee   = $total_amenability_employee;
            $member_voucher->wife       = $total_amenability_wife;
            $member_voucher->child      = $total_amenability_child;
            $member_voucher->total      = $total_amenability;
            $member_voucher->status     = '1';
            $member_voucher->save();

            DB::commit();
            Alert::success('Voucher Anggota Berhasil Ditambahkan');
            return redirect()->back();
        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return $this->responseJSON([], 500, $th);
        }
    }

    public function edit($id)
    {
        $dataMemberVoucher = MemberVoucher::find($id);
        $employee   = $dataMemberVoucher->employee;
        $wife       = $dataMemberVoucher->wife;
        $child      = $dataMemberVoucher->child;

        $user = User::with('estate')->where('id', $dataMemberVoucher->member_id)->first();

        $amenability_employee = Amenability::where([['name', 'Pekerja'], ['status', '1']])->first()->limit;
        $amenability_wife = Amenability::where([['name', 'Istri'], ['status', '1']])->first()->limit;
        $amenability_child = Amenability::where([['name', 'Anak'], ['status', '1']])->first()->limit;

        $total_amenability_employee = $employee / $amenability_employee;
        $total_amenability_wife = $wife / $amenability_wife;
        $total_amenability_child = $child / $amenability_child;

        $data = [
            'id'            => $dataMemberVoucher->id,
            'member_id'     => $dataMemberVoucher->member_id,
            'estate_name'   => $user->estate->estate,
            'wife'          => $total_amenability_wife,
            'child'         => $total_amenability_child,
            'users'         => User::with('estate', 'memberType')
                ->where('role_id', 4)
                ->where('outlet_id', Auth::user()->outlet_id)
                ->get(),
        ];

        return view('page.voucher.edit-voucher-member', $data);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'member_id' => 'required',
                'wife'      => 'required',
                'child'     => 'required',
            ]);
            $id         = $request->id;
            $member_id  = $request->member_id;
            $employee   = 1;
            $wife       = $request->wife;
            $child      = $request->child;

            $dataMemberVoucher = MemberVoucher::find($id);
            $dataMemberVoucher->status = '0';
            $dataMemberVoucher->save();

            $amenability_employee = Amenability::where([['name', 'Pekerja'], ['status', '1']])->first()->limit;
            $amenability_wife = Amenability::where([['name', 'Istri'], ['status', '1']])->first()->limit;
            $amenability_child = Amenability::where([['name', 'Anak'], ['status', '1']])->first()->limit;

            $total_amenability_employee = $amenability_employee * $employee;
            $total_amenability_wife = $amenability_wife * $wife;
            $total_amenability_child = $amenability_child * $child;
            $total_amenability = $total_amenability_employee + $total_amenability_wife + $total_amenability_child;

            $member_voucher = new MemberVoucher();
            $member_voucher->member_id  = $member_id;
            $member_voucher->employee   = $total_amenability_employee;
            $member_voucher->wife       = $total_amenability_wife;
            $member_voucher->child      = $total_amenability_child;
            $member_voucher->total      = $total_amenability;
            $member_voucher->status     = '1';
            $member_voucher->save();

            DB::commit();
            Alert::success('Voucher Anggota Berhasil Diupdate');
            return redirect()->route('voucher-member');
        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return $this->responseJSON([], 500, $th);
        }
    }
}
