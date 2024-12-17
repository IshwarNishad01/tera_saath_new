<div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl z-1035">
    <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
    <div class="card collapse-sidebar c-scrollbar-light shadow-none">
        <div class="card-header pr-1 pl-3">
            <h5 class="mb-0 h6"><?php echo e(translate('ADVANCED SEARCH')); ?></h5>
            <button class="btn btn-sm p-2 d-xl-none filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" type="button">
                <i class="las la-times la-2x"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="pb-4">
                <form action="<?php echo e(route('member.listing')); ?>" method="GET">
                    <input name="_method" type="hidden" value="PATCH">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Age From')); ?></label>
                                <select class="form-control aiz-selectpicker" name="age_from" data-live-search="true">
                                    <option>Select age</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                    <option>32</option>
                                    <option>33</option>
                                    <option>34</option>
                                    <option>35</option>
                                    <option>36</option>
                                    <option>37</option>
                                    <option>38</option>
                                    <option>39</option>
                                    <option>40</option>
                                    <option>41</option>
                                    <option>42</option>
                                    <option>43</option>
                                    <option>44</option>
                                    <option>45</option>
                                    <option>46</option>
                                    <option>47</option>
                                    <option>48</option>
                                    <option>49</option>
                                    <option>50</option>
                                    <option>51</option>
                                    <option>52</option>
                                    <option>53</option>
                                    <option>54</option>
                                    <option>55</option>
                                    <option>56</option>
                                    <option>57</option>
                                    <option>58</option>
                                    <option>59</option>
                                    <option>60</option>
                                    <option>61</option>
                                    <option>62</option>
                                    <option>63</option>
                                    <option>64</option>
                                    <option>65</option>
                                    <option>66</option>
                                    <option>67</option>
                                    <option>68</option>
                                    <option>69</option>
                                    <option>70</option>
                                    <option>71</option>
                                   
                                </select>
                                <!-- <input type="number" name="age_from" value="<?php echo e($age_from); ?>" class="form-control"> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('To')); ?></label>
                                 <select class="form-control aiz-selectpicker" name="age_to" data-live-search="true">
                                    <option>Select age</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                    <option>32</option>
                                    <option>33</option>
                                    <option>34</option>
                                    <option>35</option>
                                    <option>36</option>
                                    <option>37</option>
                                    <option>38</option>
                                    <option>39</option>
                                    <option>40</option>
                                    <option>41</option>
                                    <option>42</option>
                                    <option>43</option>
                                    <option>44</option>
                                    <option>45</option>
                                    <option>46</option>
                                    <option>47</option>
                                    <option>48</option>
                                    <option>49</option>
                                    <option>50</option>
                                    <option>51</option>
                                    <option>52</option>
                                    <option>53</option>
                                    <option>54</option>
                                    <option>55</option>
                                    <option>56</option>
                                    <option>57</option>
                                    <option>58</option>
                                    <option>59</option>
                                    <option>60</option>
                                    <option>61</option>
                                    <option>62</option>
                                    <option>63</option>
                                    <option>64</option>
                                    <option>65</option>
                                    <option>66</option>
                                    <option>67</option>
                                    <option>68</option>
                                    <option>69</option>
                                    <option>70</option>
                                    <option>71</option>
                                </select>
                                <!-- <input type="number" name="age_to" value="<?php echo e($age_to); ?>" class="form-control"> -->
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Member ID')); ?></label>
                                <input type="text" name="member_code" value="<?php echo e($member_code); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Maritial Status')); ?></label>
                                <?php $marital_statuses = \App\Models\MaritalStatus::all(); ?>
                                <select class="form-control aiz-selectpicker" name="marital_status[]" data-live-search="true" multiple>
                                    <option value=""><?php echo e(translate('Any')); ?></option>
                                    <?php $__currentLoopData = $marital_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marital_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($marital_status->id); ?>" <?php if($matital_status == $marital_status->id): ?> selected <?php endif; ?> ><?php echo e($marital_status->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Religion')); ?></label>
                                <?php $religions = \App\Models\Religion::all(); ?>
                                <select name="religion_id" id="religion_id" class="form-control aiz-selectpicker"  data-live-search="true" >
                                    <option value=""><?php echo e(translate('Choose One')); ?></option>
                                    <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($religion->id); ?>" <?php if($religion->id == $religion_id): ?> selected <?php endif; ?>> <?php echo e($religion->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Caste')); ?></label>
                                <select name="caste_id" id="caste_id" class="form-control aiz-selectpicker" data-live-search="true" >
                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Sub Caste')); ?></label>
                                <select name="sub_caste_id" id="sub_caste_id" class="form-control aiz-selectpicker" data-live-search="true">
                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Mother Tongue')); ?></label>
                                <?php $mother_tongues = \App\Models\MemberLanguage::all(); ?>
                                <select name="mother_tongue" class="form-control aiz-selectpicker" data-live-search="true" >
                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                    <?php $__currentLoopData = $mother_tongues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mother_tongue_select): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($mother_tongue_select->id); ?>" <?php if($mother_tongue_select->id == $mother_tongue): ?> selected <?php endif; ?>> <?php echo e($mother_tongue_select->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-grohp mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Profession')); ?></label>
                                <input type="text" name="profession" value="<?php echo e($profession); ?>" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Country')); ?></label>
                                <?php $countries = \App\Models\Country::all(); ?>
                                <select name="country_id" id="country_id" class="form-control aiz-selectpicker" data-live-search="true" >
                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>" <?php if($country->id == $country_id): ?> selected <?php endif; ?> ><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('State')); ?></label>
                                <select name="state_id" id="state_id" class="form-control aiz-selectpicker" data-live-search="true" >

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('City')); ?></label>
                                <select name="city_id" id="city_id" class="form-control aiz-selectpicker" data-live-search="true" >

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Min Height')); ?></label>
                                <select name="min_height" class="form-control aiz-selectpicker" data-live-search="true" >
                                    <option>Select height</option>
                                    <option>4'1"</option>
                                    <option>4'2"</option>
                                    <option>4'3"</option>
                                    <option>4'4"</option>
                                    <option>4'5"</option>
                                    <option>4'6"</option>
                                    <option>4'7"</option>
                                    <option>4'8"</option>
                                    <option>4'9"</option>
                                    <option>4'10</option>
                                    <option>5'0"</option>
                                    <option>5'1"</option>
                                    <option>5'2"</option>
                                    <option>5'3"</option>
                                    <option>5'4"</option>
                                    <option>5'5"</option>
                                    <option>5'6"</option>
                                    <option>5'7"</option>
                                    <option>5'8"</option>
                                    <option>5'9"</option>
                                    <option>6'0"</option>
                                    <option>6'1"</option>
                                    <option>6'2"</option>
                                    <option>6'3"</option>
                                    <option>6'4"</option>
                                    <option>6'5"</option>
                                    <option>6'6</option>
                                    <option>6'7</option>
                                    <option>6'8</option>
                                    <option>6'9</option>
                                    <option>6'10</option>
                                
                                </select>
                                <!-- <input type="number" name="min_height" value="<?php echo e($min_height); ?>" class="form-control" min="0" step="0.01"  > -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name"><?php echo e(translate('Max Height')); ?></label>
                                <select class="form-control aiz-selectpicker" data-live-search="true"  name="max_height">
                                   <option>Select height</option>
                                    <option>4'1"</option>
                                    <option>4'2"</option>
                                    <option>4'3"</option>
                                    <option>4'4"</option>
                                    <option>4'5"</option>
                                    <option>4'6"</option>
                                    <option>4'7"</option>
                                    <option>4'8"</option>
                                    <option>4'9"</option>
                                    <option>4'10</option>
                                    <option>5'0"</option>
                                    <option>5'1"</option>
                                    <option>5'2"</option>
                                    <option>5'3"</option>
                                    <option>5'4"</option>
                                    <option>5'5"</option>
                                    <option>5'6"</option>
                                    <option>5'7"</option>
                                    <option>5'8"</option>
                                    <option>5'9"</option>
                                    <option>6'0"</option>
                                    <option>6'1"</option>
                                    <option>6'2"</option>
                                    <option>6'3"</option>
                                    <option>6'4"</option>
                                    <option>6'5"</option>
                                    <option>6'6</option>
                                    <option>6'7</option>
                                    <option>6'8</option>
                                    <option>6'9</option>
                                    <option>6'10</option>
                                </select>
                                <!-- <input type="number" name="max_height" value="<?php echo e($max_height); ?>" class="form-control" min="0" step="0.01"   > -->
                          </div>
                        </div>
                    </div>
                    <h6 class="separator text-left mb-3 fs-12 text-uppercase text-secondary">
                        <span class="bg-white pr-3"><?php echo e(translate('Member Type')); ?></span>
                    </h6>
                    <div class="aiz-radio-list">
                        <label class="aiz-radio">
                            <input type="radio" name="member_type" value="2" onchange="applyFilter()" <?php if($member_type == 2): ?> checked <?php endif; ?> > <?php echo e(translate('Premium Member')); ?>

                            <span class="aiz-rounded-check"></span>
                        </label>
                        <label class="aiz-radio">
                            <input type="radio" name="member_type" value="1" onchange="applyFilter()"  <?php if($member_type == 1): ?> checked <?php endif; ?> > <?php echo e(translate('Free member')); ?>

                            <span class="aiz-rounded-check"></span>
                        </label>
                        <label class="aiz-radio">
                            <input type="radio" name="member_type" value="0" <?php if($member_type == 0): ?> checked <?php endif; ?>> <?php echo e(translate('All Member')); ?>

                            <span class="aiz-rounded-check"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-4"><?php echo e(translate('Search')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/member_listing/advanced_search.blade.php ENDPATH**/ ?>