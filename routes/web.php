<?php

use App\Http\Controllers\AssemblyWorkController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DCController;
use App\Http\Controllers\DcInrController;
use App\Http\Controllers\DcInrItemController;
use App\Http\Controllers\DcIrController;
use App\Http\Controllers\DcIrItemController;
use App\Http\Controllers\DCItemController;
use App\Http\Controllers\DcOnrController;
use App\Http\Controllers\DcOnrItemController;
use App\Http\Controllers\DcOrController;
use App\Http\Controllers\DcOrItemController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignWorkController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EnquiryDController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\GateEntryController;
use App\Http\Controllers\GateEntryItemController;
use App\Http\Controllers\GRNController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\POController;
use App\Http\Controllers\POItemController;
use App\Http\Controllers\ProductionWorkController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectElementController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\WorkCatgController;
use App\Models\Followup;
use App\Models\ItemCategory;
use App\Models\WorkCatg;
use Illuminate\Support\Facades\Route;


//! login
Route::get('/', [LoginController::class,'login'])->name('login');
Route::Post('/', [LoginController::class,'loginPost'])->name('loginPost');
Route::Post('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/change-password', [LoginController::class,'changePassword'])->name('changePassword');
Route::post('/change-password', [LoginController::class,'changePasswordPost'])->name('changePasswordPost');


Route::middleware('auth')->group(function () {

    //! dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //!  masters

    //! department
    Route::get('/masters/department-list',[DepartmentController::class,'index'])->name('department');
    Route::get('/masters/department-add',[DepartmentController::class,'add'])->name('departmentAdd');
    Route::post('/masters/department-add',[DepartmentController::class,'addPost'])->name('departmentAddPost');
    Route::get('/masters/department-edit/{id}',[DepartmentController::class,'edit'])->name('departmentEdit');
    Route::post('/masters/department-edit/{id}',[DepartmentController::class,'editPost'])->name('departmentEditPost');
    Route::post('/masters/department-delete/{id}',[DepartmentController::class,'delete'])->name('departmentDelete');

    //! user
    Route::get('/masters/emp-list',[EmpController::class,'index'])->name('emp');
    Route::get('/masters/emp-add',[EmpController::class,'add'])->name('empAdd');
    Route::post('/masters/emp-add',[EmpController::class,'addPost'])->name('empAddPost');
    Route::get('/masters/emp-edit/{id}',[EmpController::class,'edit'])->name('empEdit');
    Route::post('/masters/emp-edit/{id}',[EmpController::class,'editPost'])->name('empEditPost');
    Route::post('/masters/emp-delete/{id}',[EmpController::class,'delete'])->name('empDelete');

    //! Client
    Route::get('/masters/client-list',[ClientController::class,'index'])->name('client');
    Route::get('/masters/client-add',[ClientController::class,'add'])->name('clientAdd');
    Route::post('/masters/client-add',[ClientController::class,'addPost'])->name('clientAddPost');
    Route::get('/masters/client-edit/{id}',[ClientController::class,'edit'])->name('clientEdit');
    Route::post('/masters/client-edit/{id}',[ClientController::class,'editPost'])->name('clientEditPost');
    Route::post('/masters/client-delete/{id}',[ClientController::class,'delete'])->name('clientDelete');

    //! vender
    Route::get('/masters/vender-list',[VenderController::class,'index'])->name('vender');
    Route::get('/masters/vender-add',[VenderController::class,'add'])->name('venderAdd');
    Route::post('/masters/vender-add',[VenderController::class,'addPost'])->name('venderAddPost');
    Route::get('/masters/vender-edit/{id}',[VenderController::class,'edit'])->name('venderEdit');
    Route::post('/masters/vender-edit/{id}',[VenderController::class,'editPost'])->name('venderEditPost');
    Route::post('/masters/vender-delete/{id}',[VenderController::class,'delete'])->name('venderDelete');


    //! party
    Route::get('/masters/party-list',[PartyController::class,'index'])->name('party');
    Route::get('/masters/party-add',[PartyController::class,'add'])->name('partyAdd');
    Route::post('/masters/party-add',[PartyController::class,'addPost'])->name('partyAddPost');
    Route::get('/masters/party-edit/{id}',[PartyController::class,'edit'])->name('partyEdit');
    Route::post('/masters/party-edit/{id}',[PartyController::class,'editPost'])->name('partyEditPost');
    Route::post('/masters/party-delete/{id}',[PartyController::class,'delete'])->name('partyDelete');


    //! Machine
    Route::get('/masters/machine-list',[MachineController::class,'index'])->name('machine');
    Route::get('/masters/machine-add',[MachineController::class,'add'])->name('machineAdd');
    Route::post('/masters/machine-add',[MachineController::class,'addPost'])->name('machineAddPost');
    Route::get('/masters/machine-edit/{id}',[MachineController::class,'edit'])->name('machineEdit');
    Route::post('/masters/machine-edit/{id}',[MachineController::class,'editPost'])->name('machineEditPost');
    Route::post('/masters/machine-delete/{id}',[MachineController::class,'delete'])->name('machineDelete');

    //! tax
    Route::get('/masters/tax-list',[TaxController::class,'index'])->name('tax');
    Route::get('/masters/tax-add',[TaxController::class,'add'])->name('taxAdd');
    Route::post('/masters/tax-add',[TaxController::class,'addPost'])->name('taxAddPost');
    Route::get('/masters/tax-edit/{id}',[TaxController::class,'edit'])->name('taxEdit');
    Route::post('/masters/tax-edit/{id}',[TaxController::class,'editPost'])->name('taxEditPost');
    Route::post('/masters/tax-delete/{id}',[TaxController::class,'delete'])->name('taxDelete');


    //! Unit
    Route::get('/masters/unit-list',[UnitController::class,'index'])->name('unit');
    Route::get('/masters/unit-add',[UnitController::class,'add'])->name('unitAdd');
    Route::post('/masters/unit-add',[UnitController::class,'addPost'])->name('unitAddPost');
    Route::get('/masters/unit-edit/{id}',[UnitController::class,'edit'])->name('unitEdit');
    Route::post('/masters/unit-edit/{id}',[UnitController::class,'editPost'])->name('unitEditPost');
    Route::post('/masters/unit-delete/{id}',[UnitController::class,'delete'])->name('unitDelete');



    //! Work Category
    Route::get('/masters/work-catg-list',[WorkCatgController::class,'index'])->name('workCatg');
    Route::get('/masters/work-catg-add',[WorkCatgController::class,'add'])->name('workCatgAdd');
    Route::post('/masters/work-catg-add',[WorkCatgController::class,'addPost'])->name('workCatgAddPost');
    Route::get('/masters/work-catg-edit/{id}',[WorkCatgController::class,'edit'])->name('workCatgEdit');
    Route::post('/masters/work-catg-edit/{id}',[WorkCatgController::class,'editPost'])->name('workCatgEditPost');
    Route::post('/masters/work-catg-delete/{id}',[WorkCatgController::class,'delete'])->name('workCatgDelete');


    //! Item Category
    Route::get('/masters/itemcategory-list',[ItemCategoryController::class,'index'])->name('ic');
    Route::get('/masters/itemcategory-add',[ItemCategoryController::class,'add'])->name('icAdd');
    Route::post('/masters/itemcategory-add',[ItemCategoryController::class,'addPost'])->name('icAddPost');
    Route::get('/masters/itemcategory-edit/{id}',[ItemCategoryController::class,'edit'])->name('icEdit');
    Route::post('/masters/itemcategory-edit/{id}',[ItemCategoryController::class,'editPost'])->name('icEditPost');
    Route::post('/masters/itemcategory-delete/{id}',[ItemCategoryController::class,'delete'])->name('icDelete');


    //! Item
    Route::get('/masters/item-list',[ItemController::class,'index'])->name('item');
    Route::get('/masters/item-add',[ItemController::class,'add'])->name('itemAdd');
    Route::post('/masters/item-add',[ItemController::class,'addPost'])->name('itemAddPost');
    Route::get('/masters/item-edit/{id}',[ItemController::class,'edit'])->name('itemEdit');
    Route::get('/masters/item-log/{id}',[ItemController::class,'log'])->name('itemLog');
    Route::post('/masters/item-edit/{id}',[ItemController::class,'editPost'])->name('itemEditPost');
    Route::post('/masters/item-delete/{id}',[ItemController::class,'delete'])->name('itemDelete');



    //! Enquiry
    Route::get('/design/enquiry-list',[EnquiryController::class,'index'])->name('enquiry');
    Route::get('/design/enquiry-add',[EnquiryController::class,'add'])->name('enquiryAdd');
    Route::post('/design/enquiry-add',[EnquiryController::class,'addPost'])->name('enquiryAddPost');
    Route::get('/design/enquiry-edit/{id}',[EnquiryController::class,'edit'])->name('enquiryEdit');
    Route::post('/design/enquiry-edit/{id}',[EnquiryController::class,'editPost'])->name('enquiryEditPost');
    Route::post('/design/enquiry-delete/{id}',[EnquiryController::class,'delete'])->name('enquiryDelete');


    //! Enquiry Details
    Route::get('/design/enquiry-details-list/{id}',[EnquiryDController::class,'index'])->name('enqdetails');
    Route::get('/design/enquiry-details-add/{id}',[EnquiryDController::class,'add'])->name('enqdetailsAdd');
    Route::post('/design/enquiry-details-add/{id}',[EnquiryDController::class,'addPost'])->name('enqdetailsAddPost');
    Route::get('/design/enquiry-details-edit/{pid}/{id}',[EnquiryDController::class,'edit'])->name('enqdetailsEdit');
    Route::post('/design/enquiry-details-edit/{pid}/{id}',[EnquiryDController::class,'editPost'])->name('enqdetailsEditPost');
    Route::post('/design/enquiry-details-delete/{pid}/{id}',[EnquiryDController::class,'delete'])->name('enqdetailsDelete');


    //! Quotation
    Route::get('/design/quotation-list',[QuotationController::class,'index'])->name('quotation');
    Route::get('/design/quotation-add/{id}',[QuotationController::class,'add'])->name('quotationAdd'); // this is enq_id = {id}
    Route::post('/design/quotation-add',[QuotationController::class,'addPost'])->name('quotationAddPost');
    Route::get('/design/quotation-edit/{id}',[QuotationController::class,'edit'])->name('quotationEdit');
    Route::post('/design/quotation-edit/{id}',[QuotationController::class,'editPost'])->name('quotationEditPost');
    Route::post('/design/quotation-delete/{id}',[QuotationController::class,'delete'])->name('quotationDelete');
    Route::get('/design/quotation-view/{id}',[QuotationController::class,'view'])->name('quotationView');


    //! Quotation Details
    Route::get('/design/quotation-details-list/{id}',[QuotationDController::class,'index'])->name('quotationdetail');
    Route::get('/design/quotation-details-add/{id}',[QuotationDController::class,'add'])->name('quotationdetailAdd');
    Route::post('/design/quotation-details-add/{id}',[QuotationDController::class,'addPost'])->name('quotationdetailAddPost');
    Route::get('/design/quotation-details-edit/{pid}/{id}',[QuotationDController::class,'edit'])->name('quotationdetailEdit');
    Route::post('/design/quotation-details-edit/{pid}/{id}',[QuotationDController::class,'editPost'])->name('quotationdetailEditPost');
    Route::post('/design/quotation-details-delete/{pid}/{id}',[QuotationDController::class,'delete'])->name('quotationdetailDelete');

//! followup
Route::get('/design/quotation/followup-list/{id}',[FollowupController::class,'index'])->name('followup');
Route::get('/design/quotation/followup-add/{id}',[FollowupController::class,'add'])->name('followupAdd'); 
Route::post('/design/quotation/followup-add/{id}',[FollowupController::class,'addPost'])->name('followupAddPost');
Route::get('/design/quotation/followup-edit/{pid}/{id}',[FollowupController::class,'edit'])->name('followupEdit');
Route::post('/design/quotation/followup-edit/{pid}/{id}',[FollowupController::class,'editPost'])->name('followupEditPost');
Route::post('/design/quotation/followup-delete/{pid}/{id}',[FollowupController::class,'delete'])->name('followupDelete');


//! Project
Route::get('/design/project-list',[ProjectController::class,'index'])->name('project');
Route::get('/design/project-add/{id}',[ProjectController::class,'add'])->name('projectAdd'); // this quotation id
Route::post('/design/project-add',[ProjectController::class,'addPost'])->name('projectAddPost');
Route::get('/design/project-edit/{id}',[ProjectController::class,'edit'])->name('projectEdit');
Route::post('/design/project-edit/{id}',[ProjectController::class,'editPost'])->name('projectEditPost');
Route::post('/design/project-delete/{id}',[ProjectController::class,'delete'])->name('projectDelete');



//! Project Element
Route::get('/design/project-element-list/{id}',[ProjectElementController::class,'index'])->name('projectElement');
Route::get('/design/project-element-add/{id}',[ProjectElementController::class,'add'])->name('projectElementAdd');
Route::post('/design/project-element-add/{id}',[ProjectElementController::class,'addPost'])->name('projectElementAddPost');
Route::get('/design/project-element-edit/{pid}/{id}',[ProjectElementController::class,'edit'])->name('projectElementEdit');
Route::post('/design/project-element-edit/{pid}/{id}',[ProjectElementController::class,'editPost'])->name('projectElementEditPost');
Route::post('/design/project-element-delete/{pid}/{id}',[ProjectElementController::class,'delete'])->name('projectElementDelete');
Route::post('/design/project-element-add-excel/{id}',[ProjectElementController::class,'addExcel'])->name('elementAddExcel');


//! design work
Route::get('/design/work-list',[DesignWorkController::class,'index'])->name('designWork');
Route::get('/design/work-add',[DesignWorkController::class,'add'])->name('designWorkAdd'); 
Route::post('/design/work-add',[DesignWorkController::class,'addPost'])->name('designWorkAddPost');
Route::get('/design/work-edit/{id}',[DesignWorkController::class,'edit'])->name('designWorkEdit');
Route::post('/design/work-edit/{id}',[DesignWorkController::class,'editPost'])->name('designWorkEditPost');
Route::post('/design/work-delete/{id}',[DesignWorkController::class,'delete'])->name('designWorkDelete');


//! PO
Route::get('/purchase/po-list',[POController::class,'index'])->name('po');
Route::get('/purchase/po-add',[POController::class,'add'])->name('poAdd');
Route::post('/purchase/po-add',[POController::class,'addPost'])->name('poAddPost');
Route::get('/purchase/po-edit/{id}',[POController::class,'edit'])->name('poEdit');
Route::post('/purchase/po-edit/{id}',[POController::class,'editPost'])->name('poEditPost');
Route::post('/purchase/po-delete/{id}',[POController::class,'delete'])->name('poDelete');
Route::get('/purchase/po-view/{id}',[POController::class,'view'])->name('poView');
Route::get('/purchase/project-po/{id}',[POController::class,'projectPOAdd'])->name('projectPOAdd');
Route::post('/purchase/project-po-add/{id}', [POController::class, 'projectPOAddPost'])->name('projectPOAddPost');


//! PO Item
Route::get('/purchase/po-item-list/{id}',[POItemController::class,'index'])->name('poItem');
Route::get('/purchase/po-item-add/{id}',[POItemController::class,'add'])->name('poItemAdd');
Route::post('/purchase/po-item-add/{id}',[POItemController::class,'addPost'])->name('poItemAddPost');
Route::get('/purchase/po-item-edit/{pid}/{id}',[POItemController::class,'edit'])->name('poItemEdit');
Route::post('/purchase/po-item-edit/{pid}/{id}',[POItemController::class,'editPost'])->name('poItemEditPost');
Route::post('/purchase/po-item-delete/{pid}/{id}',[POItemController::class,'delete'])->name('poItemDelete');


//! DC Inr
Route::get('/store/inward/dcinr-list',[DcInrController::class,'index'])->name('dcinr');
Route::get('/store/inward/dcinr-add',[DcInrController::class,'add'])->name('dcinrAdd');
Route::post('/store/inward/dcinr-add',[DcInrController::class,'addPost'])->name('dcinrAddPost');
Route::get('/store/inward/dcinr-edit/{id}',[DcInrController::class,'edit'])->name('dcinrEdit');
Route::get('/store/inward/dcinr-view/{id}',[DcInrController::class,'view'])->name('dcinrView');
Route::post('/store/inward/dcinr-edit/{id}',[DcInrController::class,'editPost'])->name('dcinrEditPost');
Route::post('/store/inward/dcinr-delete/{id}',[DcInrController::class,'delete'])->name('dcinrDelete');

//! DC Inr item
Route::get('/store/inward/dcinr-item-list/{id}',[DcInrItemController ::class,'index'])->name('dcinrItem');
Route::get('/store/inward/dcinr-item-add/{id}',[DcInrItemController::class,'add'])->name('dcinrItemAdd');
Route::post('/store/inward/dcinr-item-add/{id}',[DcInrItemController::class,'addPost'])->name('dcinrItemAddPost');
Route::get('/store/inward/dcinr-item-edit/{pid}/{id}',[DcInrItemController::class,'edit'])->name('dcinrItemEdit');
Route::post('/store/inward/dcinr-item-edit/{pid}/{id}',[DcInrItemController::class,'editPost'])->name('dcinrItemEditPost');
Route::post('/store/inward/dcinr-item-delete/{pid}/{id}',[DcInrItemController::class,'delete'])->name('dcinrItemDelete');



//! DC Ir
Route::get('/store/inward/dcir-list',[DcIrController::class,'index'])->name('dcir');
Route::get('/store/inward/dcir-add',[DcIrController::class,'add'])->name('dcirAdd');
Route::post('/store/inward/dcir-add',[DcIrController::class,'addPost'])->name('dcirAddPost');
Route::get('/store/inward/dcir-edit/{id}',[DcIrController::class,'edit'])->name('dcirEdit');
Route::get('/store/inward/dcir-view/{id}',[DcIrController::class,'view'])->name('dcirView');
Route::post('/store/inward/dcir-edit/{id}',[DcIrController::class,'editPost'])->name('dcirEditPost');
Route::post('/store/inward/dcir-delete/{id}',[DcIrController::class,'delete'])->name('dcirDelete');

//! DC Ir item
Route::get('/store/inward/dcir-item-list/{id}',[DcIrItemController::class,'index'])->name('dcirItem');
Route::get('/store/inward/dcir-item-add/{id}',[DcIrItemController::class,'add'])->name('dcirItemAdd');
Route::post('/store/inward/dcir-item-add/{id}',[DcIrItemController::class,'addPost'])->name('dcirItemAddPost');
Route::get('/store/inward/dcir-item-edit/{pid}/{id}',[DcIrItemController::class,'edit'])->name('dcirItemEdit');
Route::post('/store/inward/dcir-item-edit/{pid}/{id}',[DcIrItemController::class,'editPost'])->name('dcirItemEditPost');
Route::post('/store/inward/dcir-item-delete/{pid}/{id}',[DcIrItemController::class,'delete'])->name('dcirItemDelete');



//! DC Onr
Route::get('/store/outward/dconr-list',[DcOnrController::class,'index'])->name('dconr');
Route::get('/store/outward/dconr-add',[DcOnrController::class,'add'])->name('dconrAdd');
Route::post('/store/outward/dconr-add',[DcOnrController::class,'addPost'])->name('dconrAddPost');
Route::get('/store/outward/dconr-edit/{id}',[DcOnrController::class,'edit'])->name('dconrEdit');
Route::get('/store/outward/dconr-view/{id}',[DcOnrController::class,'view'])->name('dconrView');
Route::get('/store/outward/dconr-dispatch/{id}',[DcOnrController::class,'dispatch'])->name('dconrDispatch');
Route::post('/store/outward/dconr-edit/{id}',[DcOnrController::class,'editPost'])->name('dconrEditPost');
Route::post('/store/outward/dconr-delete/{id}',[DcOnrController::class,'delete'])->name('dconrDelete');

//! DC Onr item
Route::get('/store/outward/dconr-item-list/{id}',[DcOnrItemController ::class,'index'])->name('dconrItem');
Route::get('/store/outward/dconr-item-add/{id}',[DcOnrItemController::class,'add'])->name('dconrItemAdd');
Route::post('/store/outward/dconr-item-add/{id}',[DcOnrItemController::class,'addPost'])->name('dconrItemAddPost');
Route::get('/store/outward/dconr-item-edit/{pid}/{id}',[DcOnrItemController::class,'edit'])->name('dconrItemEdit');
Route::post('/store/outward/dconr-item-edit/{pid}/{id}',[DcOnrItemController::class,'editPost'])->name('dconrItemEditPost');
Route::post('/store/outward/dconr-item-delete/{pid}/{id}',[DcOnrItemController::class,'delete'])->name('dconrItemDelete');



//! DC Or
Route::get('/store/outward/dcor-list',[DcOrController::class,'index'])->name('dcor');
Route::get('/store/outward/dcor-add',[DcOrController::class,'add'])->name('dcorAdd');
Route::post('/store/outward/dcor-add',[DcOrController::class,'addPost'])->name('dcorAddPost');
Route::get('/store/outward/dcor-edit/{id}',[DcOrController::class,'edit'])->name('dcorEdit');
Route::get('/store/outward/dcor-view/{id}',[DcOrController::class,'view'])->name('dcorView');
Route::get('/store/outward/dcor-dispatch/{id}',[DcOrController::class,'dispatch'])->name('dcorDispatch');
Route::post('/store/outward/dcor-edit/{id}',[DcOrController::class,'editPost'])->name('dcorEditPost');
Route::post('/store/outward/dcor-delete/{id}',[DcOrController::class,'delete'])->name('dcorDelete');

//! DC Or item
Route::get('/store/outward/dcor-item-list/{id}',[DcOrItemController::class,'index'])->name('dcorItem');
Route::get('/store/outward/dcor-item-add/{id}',[DcOrItemController::class,'add'])->name('dcorItemAdd');
Route::post('/store/outward/dcor-item-add/{id}',[DcOrItemController::class,'addPost'])->name('dcorItemAddPost');
Route::get('/store/outward/dcor-item-edit/{pid}/{id}',[DcOrItemController::class,'edit'])->name('dcorItemEdit');
Route::post('/store/outward/dcor-item-edit/{pid}/{id}',[DcOrItemController::class,'editPost'])->name('dcorItemEditPost');
Route::post('/store/outward/dcor-item-delete/{pid}/{id}',[DcOrItemController::class,'delete'])->name('dcorItemDelete');


//! Gate Entery
Route::get('/gate/entry',[GateEntryController::class,'index'])->name('gateEntry');
Route::get('/gate/entry-add',[GateEntryController::class,'add'])->name('gateEntryAdd');
Route::post('/gate/entry-add',[GateEntryController::class,'addPost'])->name('gateEntryAddPost');
Route::get('/gate/entry-edit/{id}',[GateEntryController::class,'edit'])->name('gateEntryEdit');
Route::post('/gate/entry-edit/{id}',[GateEntryController::class,'editPost'])->name('gateEntryEditPost');
Route::post('/gate/entry-delete/{id}',[GateEntryController::class,'delete'])->name('gateEntryDelete');

//! Gate Entery Item
Route::get('/gate/entry-item/{id}',[GateEntryItemController::class,'index'])->name('gateEntryItem');
Route::get('/gate/entry-item-add/{id}',[GateEntryItemController::class,'add'])->name('gateEntryItemAdd');
Route::post('/gate/entry-item-add/{id}',[GateEntryItemController::class,'addPost'])->name('gateEntryItemAddPost');
Route::get('/gate/entry-item-edit/{pid}/{id}',[GateEntryItemController::class,'edit'])->name('gateEntryItemEdit');
Route::post('/gate/entry-item-edit/{pid}/{id}',[GateEntryItemController::class,'editPost'])->name('gateEntryItemEditPost');
Route::post('/gate/entry-item-delete/{pid}/{id}',[GateEntryItemController::class,'delete'])->name('gateEntryItemDelete');

//purchaseIn
Route::get('/gate/purchase-in',[GateEntryController::class,'purchaseIn'])->name('purchaseIn');
Route::post('/gate/purchase-in',[GateEntryController::class,'purchaseInPost'])->name('purchaseInPost');  
Route::get('/gate/purchase-in/item/{id}',[GateEntryController::class,'purchaseInItem'])->name('purchaseInItem');  
Route::post('/gate/purchase-in/item/{id}',[GateEntryController::class,'purchaseInItemPost'])->name('purchaseInItemPost');  


//! GRN
Route::get('/store/grn',[GRNController::class,'index'])->name('grn');
Route::get('/store/grn-add',[GRNController::class,'add'])->name('grnAdd');
Route::post('/store/grn-add',[GRNController::class,'addPost'])->name('grnAddPost');
Route::get('/store/grn-edit/{id}',[GRNController::class,'edit'])->name('grnEdit');
Route::post('/store/grn-edit/{id}',[GRNController::class,'editPost'])->name('grnEditPost');
Route::post('/store/grn-delete/{id}',[GRNController::class,'delete'])->name('grnDelete');
Route::get('/store/grn-view/{id}',[GRNController::class,'view'])->name('grnView');
Route::post('/store/grn-book/{id}',[GRNController::class,'book'])->name('grnBook');


//! issue item
Route::get('/store/issue',[IssueController::class,'index'])->name('issue');
Route::post('/store/issue',[IssueController::class,'indexPost'])->name('issuePost');
Route::get('/store/issue-search',[IssueController::class,'search'])->name('issueSearch');
Route::post('/store/issue-search',[IssueController::class,'searchPost'])->name('issueSearchPost');
Route::get('/store/issue-by-project',[IssueController::class,'indexByProject'])->name('issueByProject');
Route::post('/store/issue-by-project',[IssueController::class,'indexindexByProjectPost'])->name('issueByProjectPost');


//! production work
Route::get('/production/work-list',[ProductionWorkController::class,'index'])->name('productionWork');
Route::get('/production/work-add',[ProductionWorkController::class,'add'])->name('productionWorkAdd'); 
Route::post('/production/work-add',[ProductionWorkController::class,'addPost'])->name('productionWorkAddPost');
Route::get('/production/work-edit/{id}',[ProductionWorkController::class,'edit'])->name('productionWorkEdit');
Route::post('/production/work-edit/{id}',[ProductionWorkController::class,'editPost'])->name('productionWorkEditPost');
Route::post('/production/work-delete/{id}',[ProductionWorkController::class,'delete'])->name('productionWorkDelete');


//! Assembly work
Route::get('/assembly/work-list',[AssemblyWorkController::class,'index'])->name('assemblyWork');
Route::get('/assembly/work-add',[AssemblyWorkController::class,'add'])->name('assemblyWorkAdd'); 
Route::post('/assembly/work-add',[AssemblyWorkController::class,'addPost'])->name('assemblyWorkAddPost');
Route::get('/assembly/work-edit/{id}',[AssemblyWorkController::class,'edit'])->name('assemblyWorkEdit');
Route::post('/assembly/work-edit/{id}',[AssemblyWorkController::class,'editPost'])->name('assemblyWorkEditPost');
Route::post('/assembly/work-delete/{id}',[AssemblyWorkController::class,'delete'])->name('assemblyWorkDelete');


});


Route::get('/todo-list', function () {
    return view('pages.todo.list');
})->name("todo.list");
Route::get('/todo-add', function () {
    return view('pages.todo.add');
})->name("todo.add");
Route::get('/todo-edit', function () {
    return view('pages.todo.edit');
})->name("todo.edit");








$entities = [ 'work-shop-log','assembly-log'];

foreach ($entities as $entity) {
    Route::get("/design/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/design/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/design/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/design/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/design/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/design/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}



$entities = ['in-r-dc','in-nr-dc','in-purc','out-r-dc','out-nr-dc','out-sale'];

foreach ($entities as $entity) {
    Route::get("/gate/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");
    Route::get("/gate/{$entity}-item-list", function () use ($entity) {
        return view("pages.{$entity}.item-list");
    })->name("{$entity}.item-list");

    Route::get("/gate/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");
    Route::get("/gate/{$entity}-item-add", function () use ($entity) {
        return view("pages.{$entity}.item-add");
    })->name("{$entity}.item-add");

    Route::post("/gate/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/gate/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");
    Route::get("/gate/{$entity}-item-edit", function () use ($entity) {
        return view("pages.{$entity}.item-edit");
    })->name("{$entity}.item-edit");

    Route::post("/gate/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/gate/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}
Route::get("/gate/in-purc-in", function ()  {
    return view("pages.in-purc.in");
})->name("in-purc.in");


$entities = ['in-ward','out-ward','stock','grn'];

foreach ($entities as $entity) {
    Route::get("/store/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/store/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/store/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/store/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/store/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/store/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}
Route::get("/store/issue/element-list", function ()  {
    return view("pages.issue.element-list");
})->name("issue-elements.list");
Route::get("/store/grn-view", function ()  {
    return view("pages.grn.view");
})->name("grn.view");
Route::get("/issue-add", function ()  {
    return view("pages.issue.add");
})->name("issue.add");
Route::get("/issue-add-by-project", function ()  {
    return view("pages.issue.add-by-project");
})->name("issue.add-by-project");
Route::get("/receive-add", function ()  {
    return view("pages.receive.add");
})->name("receive.add");
Route::get("/accept-add", function ()  {
    return view("pages.accept.add");
})->name("accept.add");


$entities = ['purchase','sales','income','expences'];

foreach ($entities as $entity) {
    Route::get("/accounts/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/accounts/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/accounts/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/accounts/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/accounts/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/accounts/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}
Route::get("/accounts/sales-manage", function () use ($entity) {
    return view("pages.sales.manage");
})->name("sales.manage");

$entities = ['shift','leave-app','salary'];

foreach ($entities as $entity) {
    Route::get("/hr/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/hr/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/hr/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/hr/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/hr/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/hr/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}

Route::get("/tpm/schedule-task-list", function ()  {
    return view("pages.tpm.schedule.list");
})->name("schedule-task.list");

Route::get("/tpm/schedule-task-add", function ()  {
    return view("pages.tpm.schedule.add");
})->name("schedule-task.add");

Route::get("/tpm/pending-task-list", function ()  {
    return view("pages.tpm.task.pending");
})->name("pending-task.list");

Route::get("/tpm/completed-task-list", function ()  {
    return view("pages.tpm.task.completed");
})->name("completed-task.list");

