<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = 'cases';
    protected $guarded = [];
    protected $casts = [
        'next_case_date' => 'datetime',
        'case_filing_date' => 'datetime',
    ];
    public function ledgers()
    {
        return $this->hasMany(Ledger::class,'case_service_job_id');
    }
    public function subsequents()
    {
        return $this->hasMany(CaseSubsequent::class,'cases_id');
    }
    public function bills()
    {
        return $this->hasMany(Bill::class,'bill_case_service_id');
    }
    public function cpl()
    {
        return $this->hasMany(CaseProceeding::class);
    }
    public function chamber()
    {
        return $this->belongsTo(Chamber::class, 'client_advocate_law_firm_id');
    }
    public function type()
    {
        return $this->belongsTo(CaseType::class, 'case_type_id', 'id');
    }
    public function court()
    {
        return $this->belongsTo(CaseCourt::class, 'court_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(CaseSection::class, 'section_id', 'id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'case_infos_division_id', 'id');
    }
    public function clientDivision()
    {
        return $this->belongsTo(Division::class, 'client_division_id', 'id');
    }
    public function clientDistrict()
    {
        return $this->belongsTo(District::class, 'client_district_id', 'id');
    }
    public function clientThana()
    {
        return $this->belongsTo(Thana::class, 'client_thana_id', 'id');
    }
    public function clientZone()
    {
        return $this->belongsTo(Zone::class, 'client_zone_id', 'id');
    }
    public function clientArea()
    {
        return $this->belongsTo(Area::class, 'client_area_id', 'id');
    }
    public function clientBranch()
    {
        return $this->belongsTo(Branch::class, 'client_branch_id', 'id');
    }
    public function clientCategory()
    {
        return $this->belongsTo(ClientCategory::class, 'client_category_id', 'id');
    }
    public function clientSubCategory()
    {
        return $this->belongsTo(ClientSubCategory::class, 'client_subcategory_id', 'id');
    }
    public function opponentDivision()
    {
        return $this->belongsTo(Division::class, 'opponent_division_id', 'id');
    }
    public function opponentDistrict()
    {
        return $this->belongsTo(District::class, 'opponent_district_id', 'id');
    }
    public function opponentThana()
    {
        return $this->belongsTo(Thana::class, 'opponent_thana_id', 'id');
    }
    public function opponentZone()
    {
        return $this->belongsTo(Zone::class, 'opponent_zone_id', 'id');
    }
    public function opponentArea()
    {
        return $this->belongsTo(Area::class, 'opponent_area_id', 'id');
    }
    public function opponentBranch()
    {
        return $this->belongsTo(Branch::class, 'opponent_branch_id', 'id');
    }
    public function opponentCategory()
    {
        return $this->belongsTo(ClientCategory::class, 'opponent_category_id', 'id');
    }
    public function opponentSubCategory()
    {
        return $this->belongsTo(ClientSubCategory::class, 'opponent_subcategory_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'case_infos_district_id', 'id');
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class, 'police_station_id', 'id');
    }
    public function nature()
    {
        return $this->belongsTo(CaseNature::class, 'case_nature_id', 'id');
    }
    public function prayer()
    {
        return $this->belongsTo(CasePrayer::class, 'case_prayer_id', 'id');
    }
    public function matter()
    {
        return $this->belongsTo(CaseMatter::class, 'case_matter_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function status()
    {
        return $this->belongsTo(CaseStatus::class,'case_status_id');
    }
    public function courtShort()
    {
        return $this->belongsTo(CaseCourt::class,'court_id');
    }
    public function caseCategory()
    {
        return $this->belongsTo(CaseCategory::class,'case_category_id');
    }
    public function caseTitleShort()
    {
        return $this->belongsTo(CaseTitle::class,'case_infos_case_title_id');
    }
    public function caseTitle()
    {
        return $this->belongsTo(CaseTitle::class,'case_infos_case_title_id');
    }
    public function law()
    {
        return $this->belongsTo(CaseLaw::class,'law_id');
    }
    public function disposedStatus()
    {
        return $this->belongsTo(DisposedStatus::class,'diposed_status_id');
    }
    public function disposedBy()
    {
        return $this->belongsTo(DisposedBy::class,'diposed_by_id');
    }
    public function diposedEvidence()
    {
        return $this->belongsTo(DisposedEvidence::class,'evidence_of_diposed_id');
    }
    public function eveidenceType()
    {
        return $this->belongsTo(EvidenceType::class,'evidence_type_id');
    }
    public function clientOnBehalf()
    {
        return $this->belongsTo(ClientBehalf::class,'client_party_id');
    }
    public function opponentOnBehalf()
    {
        return $this->belongsTo(ClientBehalf::class,'opponent_info_id');
    }
    public function advocate()
    {
        return $this->belongsTo(Hr::class,'client_advocate_law_firm_id');
    }
    public function leadLawyer()
    {
        return $this->belongsTo(Hr::class,'client_lead_lawyer_id');
    }
    public function assignedLawyer()
    {
        return $this->belongsTo(Hr::class,'client_assigned_lawyer_id');
    }
    public function clerk()
    {
        return $this->belongsTo(Hr::class,'client_assigned_clerk_id');
    }
    public function clerkNumber()
    {
        return $this->belongsTo(Hr::class,'client_clerk_contact_number_id');
    }
    
    public function representative(){
        return $this->belongsTo(ClientRepresentative::class,'client_representative_party_name');
    }
    
}
