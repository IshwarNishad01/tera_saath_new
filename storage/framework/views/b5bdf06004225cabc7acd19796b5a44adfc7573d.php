

<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Member Details')); ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <span class="avatar avatar-xl m-3 center">
                    <?php if(!uploaded_asset($member->photo)): ?>
                        <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(uploaded_asset($member->photo)); ?>">
                    <?php endif; ?>
                </span>
                <p><?php echo e($member->first_name.' '.$member->last_name); ?></p>
                <div class="pad-ver btn-groups">
                    <a href="javascript:void(0);" onclick="package_info(<?php echo e($member->id); ?>)" class="btn btn-info btn-sm add-tooltip"><?php echo e(translate('Package')); ?></i></a>
                    <?php if($member->blocked == 0): ?>
                        <a href="javascript:void(0);" onclick="block_member(<?php echo e($member->id); ?>)" class="btn btn-dark btn-sm add-tooltip"><?php echo e(translate('Block')); ?></i></a>
                    <?php elseif($member->blocked == 1): ?>
                        <a href="javascript:void(0);" onclick="unblock_member(<?php echo e($member->id); ?>)" class="btn btn-dark btn-sm add-tooltip"><?php echo e(translate('Unblock')); ?></i></a>
                    <?php endif; ?>
                    <br><br>
                    <?php if($member->deactivated == 0): ?>
                        <span class="badge badge-inline badge-success"><?php echo e(translate('Active Account')); ?></span>
                    <?php else: ?>
                        <span class="badge badge-inline badge-danger"><?php echo e(translate('Deactivated Account')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <!-- Introduction -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0 h6"><?php echo e(translate('Introduction')); ?></h5>
            </div>
            <div class="card-body">
                <p><?php echo e($member->member->introduction); ?></p>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0 h6"><?php echo e(translate('Basic Information')); ?></h5>
            </div>
            <div class="card-body">
                <table class="table">
                <tr>
                    <th><?php echo e(translate('First Name')); ?></th>
                    <td><?php echo e($member->first_name); ?></td>

                    <th><?php echo e(translate('Last Name')); ?></th>
                    <td><?php echo e($member->last_name); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(translate('Gender')); ?></th>
                    <td>
                        <?php if($member->member->gender == 1): ?>
                            <?php echo e(translate('Male')); ?>

                        <?php elseif($member->member->gender == 2): ?>
                            <?php echo e(translate('Female')); ?>

                        <?php endif; ?>
                    </td>

                    <th><?php echo e(translate('Date Of Birth')); ?></th>
                    <td><?php echo e(!empty($member->member->birthday) ? date('Y-m-d', strtotime($member->member->birthday)) : ''); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(translate('Email')); ?></th>
                    <td><?php echo e($member->email); ?></td>
                    <?php if(addon_activation('otp_system')): ?>
                        <th><?php echo e(translate('Phone Number')); ?></th>
                        <td><?php echo e($member->phone); ?></td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th><?php echo e(translate('Marital Status')); ?></th>
                    <td><?php echo e(!empty($member->member->marital_status->name) ? $member->member->marital_status->name : ""); ?></td>

                    <th><?php echo e(translate('Number Of Children')); ?></th>
                    <td><?php echo e($member->member->children); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(translate('On Behalf')); ?></th>
                    <td><?php echo e(!empty($member->member->on_behalves_id) ? $member->member->on_behalves->name : ''); ?></td>

                    <th><?php echo e(translate('Alter Phone Number')); ?></th>
                    <td><?php echo e($member->contact_number); ?></td>
                    <!-- <td><?php echo e($member->member->alphone); ?></td> -->
                </tr>
                </table>
            </div>
        </div>

        <!-- Present Address -->
        <?php if(get_setting('member_present_address_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Present Address')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <?php $present_address = \App\Models\Address::where('user_id',$member->id)->where('type','present')->first(); ?>
                            <tr>
                                <th><?php echo e(translate('City')); ?></th>
                                <td><?php echo e(!empty($present_address->city->name) ? $present_address->city->name : ""); ?></td>

                                <th><?php echo e(translate('State')); ?></th>
                              <td><?php echo e(!empty($present_address->state->name) ? $present_address->state->name : ""); ?></td>
                            </tr>
                          <tr>
                            <th><?php echo e(translate('Country')); ?></th>
                              <td><?php echo e(!empty($present_address->country->name) ? $present_address->country->name : ""); ?></td>

                              <th><?php echo e(translate('Postal Code')); ?></th>
                              <td><?php echo e(!empty($present_address->postal_code) ? $present_address->postal_code : ""); ?></td>
                          </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Education -->
        <?php if(get_setting('member_education_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Education')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th><?php echo e(translate('Degree')); ?></th>
                          <th><?php echo e(translate('Institution')); ?></th>
                          <th><?php echo e(translate('Start')); ?></th>
                          <th><?php echo e(translate('End')); ?></th>
                          <th><?php echo e(translate('Status')); ?></th>
                      </tr>

                      <?php $educations = \App\Models\Education::where('user_id',$member->id)->get(); ?>
                      <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($education->degree); ?></td>
                          <td><?php echo e($education->institution); ?></td>
                          <td><?php echo e($education->start); ?></td>
                          <td><?php echo e($education->end); ?></td>
                          <td>
                              <?php if($education->present == 1): ?>
                                  <span class="badge badge-inline badge-success"><?php echo e(translate('Active')); ?></span>
                              <?php else: ?>
                                  <span class="badge badge-inline badge-danger"><?php echo e(translate('Deactive')); ?></span>
                              <?php endif; ?>
                          </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Career -->
        <?php if(get_setting('member_career_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Career')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th><?php echo e(translate('designation')); ?></th>
                          <th><?php echo e(translate('company')); ?></th>
                          <th><?php echo e(translate('Salary')); ?></th>
                          <th><?php echo e(translate('Start')); ?></th>
                          <th><?php echo e(translate('End')); ?></th>
                          <th><?php echo e(translate('Status')); ?></th>
                      </tr>

                      <?php $careers = \App\Models\Career::where('user_id',$member->id)->get(); ?>
                      <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($career->designation); ?></td>
                          <td><?php echo e($career->company); ?></td>
                          <td><?php echo e($career->package); ?></td>
                          <td><?php echo e($career->start); ?></td>
                          <td><?php echo e($career->end); ?></td>
                          <td>
                              <?php if($career->present == 1): ?>
                                  <span class="badge badge-inline badge-success"><?php echo e(translate('Active')); ?></span>
                              <?php else: ?>
                                  <span class="badge badge-inline badge-danger"><?php echo e(translate('Deactive')); ?></span>
                              <?php endif; ?>
                          </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </table>

              </div>
          </div>
        <?php endif; ?>

        <!-- Physical Attributes -->
        <?php if(get_setting('member_physical_attributes_section') == 'on'): ?>
          <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0 h6"><?php echo e(translate('Physical Attributes')); ?></h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?php echo e(translate('Height')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->height) ? $member->physical_attributes->height : ""); ?></td>

                        <th><?php echo e(translate('Weight')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->weight) ? $member->physical_attributes->weight : ""); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(translate('Eye Color')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->eye_color) ? $member->physical_attributes->eye_color : ""); ?></td>

                        <th><?php echo e(translate('Hair Color')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->hair_color) ? $member->physical_attributes->hair_color : ""); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(translate('Complexion')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->complexion) ? $member->physical_attributes->complexion : ""); ?></td>

                        <th><?php echo e(translate('Blood Group')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->blood_group) ? $member->physical_attributes->blood_group : ""); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(translate('Body Type')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->body_type) ? $member->physical_attributes->body_type : ""); ?></td>

                        <th><?php echo e(translate('Body Art')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->body_art) ? $member->physical_attributes->body_art : ""); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(translate('Disability')); ?></th>
                        <td><?php echo e(!empty($member->physical_attributes->disability) ? $member->physical_attributes->disability : ""); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endif; ?>

        <!-- Language -->
        <?php if(get_setting('member_language_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Language')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th><?php echo e(translate('Mother Tangue')); ?></th>
                          <td>
                              <?php if(!empty($member->member->mothere_tongue)): ?>
                                  <?php echo e(\App\Models\MemberLanguage::where('id',$member->member->mothere_tongue)->first()->name); ?>

                              <?php endif; ?>
                          </td>

                          <th><?php echo e(translate('Known Languages')); ?></th>
                          <td>
                            <?php if(!empty($member->member->known_languages)): ?>
                              <?php $__currentLoopData = json_decode($member->member->known_languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="badge badge-inline badge-info">
                                      <?php echo e(\App\Models\MemberLanguage::where('id',$value)->first()->name); ?>

                                  </span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Hobbies  -->
        <?php if(get_setting('member_hobbies_and_interests_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Hobbies & Interest')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                            <tr>
                                <th><?php echo e(translate('Hobbies')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->hobbies) ? $member->hobbies->hobbies : ""); ?></td>

                                <th><?php echo e(translate('Interests')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->interests) ? $member->hobbies->interests : ""); ?></td>
                            </tr>
                          <tr>
                                <th><?php echo e(translate('Music')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->music) ? $member->hobbies->music : ""); ?></td>

                                <th><?php echo e(translate('Books')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->books) ? $member->hobbies->books : ""); ?></td>
                            </tr>
                          <tr>
                                <th><?php echo e(translate('Movies')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->movies) ? $member->hobbies->movies : ""); ?></td>

                                <th><?php echo e(translate('TV Shows')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->tv_shows) ? $member->hobbies->tv_shows : ""); ?></td>
                            </tr>
                          <tr>
                            <th><?php echo e(translate('Sports')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->sports) ? $member->hobbies->sports : ""); ?></td>

                            <th><?php echo e(translate('Fitness Activities')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->fitness_activities) ? $member->hobbies->fitness_activities : ""); ?></td>
                        </tr>
                          <tr>
                            <th><?php echo e(translate('Cuisines')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->cuisines) ? $member->hobbies->cuisines : ""); ?></td>

                            <th><?php echo e(translate('Dress Styles')); ?></th>
                              <td><?php echo e(!empty($member->hobbies->dress_styles) ? $member->hobbies->dress_styles : ""); ?></td>
                        </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Personal Attitude & Behavior -->
        <!-- <?php if(get_setting('member_personal_attitude_and_behavior_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Personal Attitude & Behavior')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                         <tr>
                                <th><?php echo e(translate('Affection')); ?></th>
                              <td><?php echo e(!empty($member->attitude->affection) ? $member->attitude->affection : ""); ?></td>

                              <th><?php echo e(translate('Humor')); ?></th>
                              <td><?php echo e(!empty($member->attitude->humor) ? $member->attitude->humor : ""); ?></td>
                         </tr>
                           <tr>
                              <th><?php echo e(translate('Political Views')); ?></th>
                              <td><?php echo e(!empty($member->attitude->political_views) ? $member->attitude->political_views : ""); ?></td>

                              <th><?php echo e(translate('Religious Service')); ?></th>
                              <td><?php echo e(!empty($member->attitude->religious_service) ? $member->attitude->religious_service : ""); ?></td>
                          </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?> -->

        <!-- Residency Information -->
       <!--  <?php if(get_setting('member_residency_information_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Residency Information')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th><?php echo e(translate('Birth Country')); ?></th>
                          <td>
                              <?php if(!empty($member->recidency->birth_country_id)): ?>
                              <?php echo e(App\Models\Country::where('id',$member->recidency->birth_country_id)->first()->name); ?>

                              <?php endif; ?>
                          </td>

                          <th><?php echo e(translate('Recidency Country')); ?></th>
                          <td>
                              <?php if(!empty($member->recidency->recidency_country_id)): ?>
                              <?php echo e(App\Models\Country::where('id',$member->recidency->recidency_country_id)->first()->name); ?>

                              <?php endif; ?>
                          </td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Growup Country')); ?></th>
                          <td>
                              <?php if(!empty($member->recidency->growup_country_id)): ?>
                              <?php echo e(App\Models\Country::where('id',$member->recidency->growup_country_id)->first()->name); ?>

                              <?php endif; ?>
                          </td>

                          <th><?php echo e(translate('Immigration Status')); ?></th>
                          <td><?php echo e(!empty($member->recidency->immigration_status) ? $member->recidency->immigration_status : ""); ?></td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?> -->

        <!-- Spiritual & Social Background -->
        <?php if(get_setting('member_spiritual_and_social_background_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Spiritual & Social Background')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th><?php echo e(translate('Religion')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->religion->name) ? $member->spiritual_backgrounds->religion->name : ""); ?></td>

                          <th><?php echo e(translate('Caste')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->caste->name) ? $member->spiritual_backgrounds->caste->name : ""); ?></td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Sub Caste')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->sub_caste->name) ? $member->spiritual_backgrounds->sub_caste->name : ""); ?></td>

                          <th><?php echo e(translate('Ethnicity')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->ethnicity) ? $member->spiritual_backgrounds->ethnicity : ""); ?></td>
                      </tr>
                      <tr>
                          <!-- <th><?php echo e(translate('Personal Value')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->personal_value) ? $member->spiritual_backgrounds->personal_value : ""); ?></td> -->

                          <th><?php echo e(translate('Family Value')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->family_value->name) ? $member->spiritual_backgrounds->family_value->name : ""); ?></td>
                      </tr>
                      <tr>
                          <!-- <th><?php echo e(translate('Community Value')); ?></th>
                          <td><?php echo e(!empty($member->spiritual_backgrounds->community_value) ? $member->spiritual_backgrounds->community_value : ""); ?></td> -->
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Life Style -->
        <?php if(get_setting('member_life_style_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Life Style')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                     <!-- <tr>
                          <th><?php echo e(translate('Diet')); ?></th>
                          <td><?php echo e(!empty($member->lifestyles->diet) ? $member->lifestyles->diet : ""); ?></td>

                          <th><?php echo e(translate('Drink')); ?></th>
                          <td><?php echo e(!empty($member->lifestyles->drink) ? $member->lifestyles->drink : ""); ?></td>
                      </tr> -->
                      <tr>
                          <th><?php echo e(translate('Veg/Non-veg')); ?></th>
                          <td><?php echo e(!empty($member->lifestyles->smoke) ? $member->lifestyles->smoke : ""); ?></td>

                          <th><?php echo e(translate('Living With')); ?></th>
                          <td><?php echo e(!empty($member->lifestyles->living_with) ? $member->lifestyles->living_with : ""); ?></td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Astronomic Information  -->
        <?php if(get_setting('member_astronomic_information_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Astronomic Information')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <!-- <tr>
                          <th><?php echo e(translate('Sun Sign')); ?></th>
                          <td><?php echo e(!empty($member->astrologies->sun_sign) ? $member->astrologies->sun_sign : ""); ?></td>

                          <th><?php echo e(translate('Moon Sign')); ?></th>
                          <td><?php echo e(!empty($member->astrologies->moon_sign) ? $member->astrologies->moon_sign : ""); ?></td>
                      </tr> -->
                      <tr>
                          <th><?php echo e(translate('Time Of Birth')); ?></th>
                          <td><?php echo e(!empty($member->astrologies->time_of_birth) ? $member->astrologies->time_of_birth : ""); ?></td>

                          <th><?php echo e(translate('City Of Birth')); ?></th>
                          <td><?php echo e(!empty($member->astrologies->city_of_birth) ? $member->astrologies->city_of_birth : ""); ?></td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Permanent Address -->
        <?php if(get_setting('member_permanent_address_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Permanent Address')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <?php $permanent_address = \App\Models\Address::where('user_id',$member->id)->where('type','permanent')->first(); ?>
                      <tr>
                          <th><?php echo e(translate('City')); ?></th>
                          <td><?php echo e(!empty($permanent_address->city->name) ? $permanent_address->city->name : ""); ?></td>

                          <th><?php echo e(translate('State')); ?></th>
                          <td><?php echo e(!empty($permanent_address->state->name) ? $permanent_address->state->name : ""); ?></td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Country')); ?></th>
                          <td><?php echo e(!empty($permanent_address->country->name) ? $permanent_address->country->name : ""); ?></td>

                          <th><?php echo e(translate('Postal Code')); ?></th>
                          <td><?php echo e(!empty($permanent_address->postal_code) ? $permanent_address->postal_code : ""); ?></td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Family Information -->
        <?php if(get_setting('member_family_information_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Family Information')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                        <tr>
                          <th><?php echo e(translate('Father')); ?></th>
                          <td><?php echo e(!empty($member->families->father) ? $member->families->father : ""); ?></td>

                           <th><?php echo e(translate('Father Description')); ?></th>
                          <td><?php echo e(!empty($member->families->fatherdesc) ? $member->families->fatherdesc : ""); ?></td>
                        </tr>

                        <tr>

                          <th><?php echo e(translate('Mother')); ?></th>
                          <td><?php echo e(!empty($member->families->mother) ? $member->families->mother : ""); ?></td>

                          <th><?php echo e(translate('Mother Description')); ?></th>
                          <td><?php echo e(!empty($member->families->motherdesc) ? $member->families->motherdesc : ""); ?></td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Sibling')); ?></th>
                          <td><?php echo e(!empty($member->families->sibling) ? $member->families->sibling : ""); ?></td>

                          <th><?php echo e(translate('Sibling Description')); ?></th>
                          <td><?php echo e(!empty($member->families->sibling_desc) ? $member->families->sibling_desc : ""); ?></td>
                      </tr>

                      <tr>
                          <th><?php echo e(translate('Father Contact Number')); ?></th>
                          <td><?php echo e(!empty($member->families->father_number) ? $member->families->father_number : ""); ?></td>

                          <th><?php echo e(translate('Mother Contact Number')); ?></th>
                          <td><?php echo e(!empty($member->families->mother_number) ? $member->families->mother_number : ""); ?></td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

        <!-- Partner Expectation -->
        <?php if(get_setting('member_partner_expectation_section') == 'on'): ?>
          <div class="card">
              <div class="card-header bg-dark text-white">
                  <h5 class="mb-0 h6"><?php echo e(translate('Partner Expectation')); ?></h5>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th><?php echo e(translate('General')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->general) ? $member->partner_expectations->general : ""); ?></td>

                          <th><?php echo e(translate('Residence Country')); ?></th>
                          <td>
                              <?php
                              $residence_country =  !empty($member->partner_expectations->residence_country_id) ? $member->partner_expectations->residence_country_id : "";
                              if(!empty($residence_country)){
                              echo \App\Models\Country::where('id',$residence_country)->first()->name;
                              }
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Height')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->height) ? $member->partner_expectations->height : ""); ?></td>

                          <th><?php echo e(translate('weight')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->weight) ? $member->partner_expectations->weight : ""); ?></td>
                      </tr>

                      <tr>
                          <th><?php echo e(translate('Marital Status')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->marital_status->name) ? $member->partner_expectations->marital_status->name : ""); ?></td>

                          <th><?php echo e(translate('Children Acceptable')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->children_acceptable) ? $member->partner_expectations->children_acceptable : ""); ?></td>
                      </tr>

                      <tr>
                          <th><?php echo e(translate('Religion')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->religion->name) ? $member->partner_expectations->religion->name : ""); ?></td>

                          <th><?php echo e(translate('Caste')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->caste->name) ? $member->partner_expectations->caste->name : ""); ?></td>
                      </tr>

                      <tr>
                          <th><?php echo e(translate('Sub Caste')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->sub_caste->name) ? $member->partner_expectations->sub_caste->name : ""); ?></td>

                          <th><?php echo e(translate('Language')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->language->name) ? $member->partner_expectations->language->name : ""); ?></td>
                      </tr>

                      <tr>
                          <th><?php echo e(translate('Education')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->education) ? $member->partner_expectations->education : ""); ?></td>

                          <th><?php echo e(translate('Profession')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->profession) ? $member->partner_expectations->profession : ""); ?></td>
                      </tr>

                      <tr>
                          <th><?php echo e(translate('Smoking Acceptable')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->smoking_acceptable) ? $member->partner_expectations->smoking_acceptable : ""); ?></td>

                          <th><?php echo e(translate('Drinking Acceptable')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->drinking_acceptable) ? $member->partner_expectations->drinking_acceptable : ""); ?></td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Diet')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->diet) ? $member->partner_expectations->diet : ""); ?></td>

                          <th><?php echo e(translate('Body Type')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->body_type) ? $member->partner_expectations->body_type : ""); ?></td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Personal Value')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->personal_value) ? $member->partner_expectations->personal_value : ""); ?></td>

                          <th><?php echo e(translate('Manglik')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->manglik) ? $member->partner_expectations->manglik : ""); ?></td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Preferred Country')); ?></th>
                          <td>
                              <?php
                                  $preferred_country =  !empty($member->partner_expectations->preferred_country_id) ? $member->partner_expectations->preferred_country_id : "";
                                  if(!empty($preferred_country)){
                                      echo \App\Models\Country::where('id',$preferred_country)->first()->name;
                                  }
                              ?>
                          </td>

                          <th><?php echo e(translate('preferred_state_id')); ?></th>
                          <td>
                              <?php
                                  $preferred_state =  !empty($member->partner_expectations->preferred_state_id) ? $member->partner_expectations->preferred_state_id : "";
                                  if(!empty($preferred_state)){
                                      echo \App\Models\State::where('id',$preferred_state)->first()->name;
                                  }
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <th><?php echo e(translate('Family Value')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->family_value->name) ? $member->partner_expectations->family_value->name : ""); ?></td>

                          <th><?php echo e(translate('complexion')); ?></th>
                          <td><?php echo e(!empty($member->partner_expectations->complexion) ? $member->partner_expectations->complexion : ""); ?></td>
                      </tr>
                  </table>
              </div>
          </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    
    <div class="modal fade member-block-modal" id="modal-basic">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal member-block" action="<?php echo e(route('members.block')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="member_id" id="member_id" value="">
                    <input type="hidden" name="block_status" id="block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6"><?php echo e(translate('Member Block !')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Blocking Reason')); ?></label>
                            <div class="col-md-9">
                                <textarea type="text" name="blocking_reason" class="form-control" placeholder="<?php echo e(translate('Blocking Reason')); ?>" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(translate('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade member-unblock-modal" id="modal-basic">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal member-block" action="<?php echo e(route('members.block')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="member_id" id="unblock_member_id" value="">
                    <input type="hidden" name="block_status" id="unblock_block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6"><?php echo e(translate('Member Unblock !')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <b><?php echo e(translate('Blocked Reason')); ?> : </b>
                            <span id="block_reason"><?php echo e($member->blocked_reason); ?></span>
                        </p>
                        <p class="mt-1"><?php echo e(translate('Are you want to unblock this member?')); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(translate('Unblock')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.create_edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function package_info(id){
         $.post('<?php echo e(route('members.package_info')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function get_package(id){
         $.post('<?php echo e(route('members.get_package')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function block_member(id){
         $('.member-block-modal').modal('show');
         $('#member_id').val(id);
         $('#block_status').val(1);
     }

     function unblock_member(id){
         $('#unblock_member_id').val(id);
         $('#unblock_block_status').val(0);
         $.post('<?php echo e(route('members.blocking_reason')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
             $('.member-unblock-modal').modal('show');
             $('#block_reason').html(data);
         });
     }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/view.blade.php ENDPATH**/ ?>