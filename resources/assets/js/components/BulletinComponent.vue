<template>

  <div id="all-lists-list-container">
    <modal v-if="isShowModal" :modalTitle="'Bulletin'">

      <div slot="header">
        <div id="form-holder">
            <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
              <div>
                  <input class="uk-input" type="text" placeholder="Title" name="title" :value="eachBulletin.title" @input="changeTitle">
              </div>
            </div>

            <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
              <div>
                  <input class="uk-input" type="text" placeholder="Who" name="who" :value="eachBulletin.who" @input="changeWho">
              </div>
              <div>
                  <input class="uk-input" type="text" placeholder="What" name="what" :value="eachBulletin.what" @input="changeWhat">
              </div>
            </div>

            <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
                  <div>
                      <input class="uk-input" type="text" placeholder="Where" name="where" :value="eachBulletin.where" @input="changeWhere">
                  </div>
                  <div>
                      <input class="uk-input" type="text" placeholder="Where" name="where" :value="eachBulletin.when" @input="changeWhen">
                  </div>
              </div>
        </div>
      </div>

      <div slot="body">
        <textarea class="uk-textarea" name="description" placeholder="Description(Optional)" @input="changeDesc"></textarea>
      </div>

      <div slot="footer">
        <button class="btn btn-success" @click="updateBulletin(eachBulletin.id)" :disabled="isDisabled">Save</button> | 
              <button class="btn btn-danger" @click="isShowModal = false">
                Close
              </button>
      </div>
    </modal>

    <!-- <success-modal v-if="showMessageModal" @close="showMessageModal = false"> -->

      <!--
        you can use custom content here to overwrite
        default content
      -->
      <!-- <input slot="header" class="uk-input" :value="eachAnnouncement.title"></input> -->

      <!-- <textarea class="uk-textarea" name="description" slot="body" :value="eachAnnouncement.description"></textarea> -->
      <!-- <div slot="body">
        <div class="success-icon text-center"></div>
        <h1>Successfully Edited</h1>
      </div> -->

      <!-- <div slot="footer" style="margin: 0 auto;">
        <button class="btn btn-success" @click="showMessageModal = false">Okay</button>
      </div>
    </success-modal> -->

    <confirm-modal v-if="showConfirmModal" @close="showConfirmModal = false">

      <!--
        you can use custom content here to overwrite
        default content
      -->
      <!-- <input slot="header" class="uk-input" :value="eachAnnouncement.title"></input> -->

      <!-- <textarea class="uk-textarea" name="description" slot="body" :value="eachAnnouncement.description"></textarea> -->
      <div slot="body">
        <h4>Are you sure you want to delete this Bulletin?</h4>
      </div>

      <div slot="footer" style="margin: 0 auto;">
        <button class="btn btn-danger" @click="deleteSelected(eachBulletin.id)">Delete</button>
        <button class="btn btn-default" @click="showConfirmModal = false">Cancel</button>
      </div>
    </confirm-modal>

    <div class="all-lists-list-content">
      <ul>
        <li class="all-lists-list-left-panel">
          <div class="all-announcement-container">
            <div class="each-announcement-container" v-for="bulletin in bulletins" @click="selectOne(bulletin)">
              <div class="announcement-title">
                <span @click="sampleClick()">{{bulletin.title}}</span>
              </div>
              <hr>
              <div class="announcement-description">
                <p>{{bulletin.description}}</p>
                <p v-if="!bulletin.description">No description.</p>

              </div>
            </div>

            <div class="each-announcement-container" v-if="bulletins.length === 0">
              No Bulletins Created Yet!
            </div>

          </div>
        </li>

        <li class="all-lists-list-right-panel">
          <div class="announcement-detail-container">
            <div class="detail-heading">
              <h4 class="detail-title">Bulletin Details</h4>
            </div>
            <div class="detail-body">
              <p><strong>Title:</strong> {{eachBulletin.title}}</p>
              <p><strong>Who:</strong> {{eachBulletin.who}}</p>
              <p><strong>What:</strong> {{eachBulletin.what}}</p>
              <p><strong>Where:</strong> {{eachBulletin.where}}</p>
              <p><strong>When:</strong> {{eachBulletin.when}}</p>
              <p><strong>Posted by:</strong> ADMIN</p>
            </div>
            <hr>
            <div class="detail-footer">
              <div class="announcement-button-container">
                <button class="btn btn-success" @click="isShowModal = true, isDisabled = true">Edit</button>
                <button class="btn btn-danger" @click="confirmDelete()">Delete</button>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script type="text/javascript">
    export default {
      data() {
        return {
          bulletins: [],
          eachBulletin: {
            id: 'No Selected ID',
            title: 'No Selected Title',
            who: 'No Selected Title',
            what: 'No Selected Title',
            where: 'No Selected Title',
            when: 'No Selected Title',
            description: 'No Selected Description',
            created_at: 'No Selected Created On',
            updated_at: 'No Selected Updated On'
          },
          monthToString: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          isShowModal: false,
          showMessageModal: false,
          showConfirmModal: false,
          isDisabled: true,
          edited: {
            title: '',
            who: '',
            what: '',
            where: '',
            when: '',
            description: ''
          },
          image_src: ''
        }
      },
      created() {
        this.getBulletin();
      },
      methods: {
        getBulletin() {
          axios.get('/admin/get-bulletins')
            .then((response) => {
            this.bulletins = response.data;
            this.populateBulletinDetails();
          });
        },
        selectOne(bulletin) {

          let createdDate = new Date(bulletin.created_at);
          let createdTimeToString = createdDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});
          let created_at = this.monthToString[createdDate.getMonth()] + ' ' + createdDate.getDate() + ', ' + createdDate.getFullYear() + ' at ' + createdTimeToString;



          let updatedDate = new Date(bulletin.updated_at);
          let updatedTimeToString = updatedDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});

          let updated_at = this.monthToString[updatedDate.getMonth()] + ' ' + updatedDate.getDate() + ', ' + updatedDate.getFullYear() + ' at ' + updatedTimeToString;


          this.eachBulletin.id = bulletin.id;
          this.eachBulletin.title = bulletin.title;
          this.eachBulletin.who = bulletin.who;
          this.eachBulletin.what = bulletin.what;
          this.eachBulletin.where = bulletin.where;
          this.eachBulletin.when = bulletin.when;
          this.eachBulletin.description = bulletin.description;
          this.eachBulletin.created_at = created_at;
          this.eachBulletin.updated_at = updated_at;
          
        },
        confirmDelete() {
          this.showConfirmModal = true;
        },
        deleteSelected(id) {
          this.showConfirmModal = false;
          axios.delete('/admin/delete-bulletin/'+id)
              .then((response) => {
                this.getBulletin();
                this.populateAnnouncementDetails();
              })
              .catch((e) => {
                console.log(e);
              });
        },
        populateBulletinDetails() {
          let createdDate = new Date(this.bulletins[0].created_at);
          let createdTimeToString = createdDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});
          let created_at = this.monthToString[createdDate.getMonth()] + ' ' + createdDate.getDate() + ', ' + createdDate.getFullYear() + ' at ' + createdTimeToString;

          let updatedDate = new Date(this.bulletins[0].updated_at);
          let timeToString = updatedDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});

          let updated_at = this.monthToString[updatedDate.getMonth()] + ' ' + updatedDate.getDate() + ', ' + updatedDate.getFullYear() + ' at ' + timeToString;

          this.eachBulletin.id = this.bulletins[0].id;
          this.eachBulletin.title = this.bulletins[0].title;
          this.eachBulletin.who = this.bulletins[0].who;
          this.eachBulletin.what = this.bulletins[0].what;
          this.eachBulletin.where = this.bulletins[0].where;
          this.eachBulletin.when = this.bulletins[0].when;
          this.eachBulletin.description = this.bulletins[0].description;
          this.eachBulletin.created_at = created_at;
          this.eachBulletin.updated_at = updated_at;
        },
        updateBulletin(id) {          
          if(this.edited.title == '') {
            this.edited.title = this.eachBulletin.title;
          }

          if(this.edited.who == '') {
            this.edited.who = this.eachBulletin.who;
          }

          if(this.edited.what == '') {
            this.edited.what = this.eachBulletin.what;
          }

          if(this.edited.where == '') {
            this.edited.where = this.eachBulletin.where;
          }

          if(this.edited.when == '') {
            this.edited.when = this.eachBulletin.when;
          }

          if(this.edited.description == '') {
            this.edited.description = this.eachBulletin.description;
          }

          this.isShowModal = false;

          axios.put(`/admin/edit-bulletin/${id}`, this.edited)
              .then((response) => {
                this.getBulletin();
                
              });

        },
        successMessage() {
          this.showMessageModal = true;
        },
        changeTitle(event) {
          this.isDisabled = false;
          this.edited.title = event.target.value;
        },
        changeWho(event) {
          this.isDisabled = false;
          this.edited.who = event.target.value;
        },
        changeWhat(event) {
          this.isDisabled = false;
          this.edited.what = event.target.value;
        },
        changeWhere(event) {
          this.isDisabled = false;
          this.edited.where = event.target.value;
        },
        changeWhen(event) {
          this.isDisabled = false;
          this.edited.when = event.target.value;
        },
        changeDesc(event) {
          this.isDisabled = false;
          this.edited.description = event.target.value;
        },
        sampleClick() {
          alert('You have clicked me. Oh Yeah!');
        }
      }
    }
    
</script>
