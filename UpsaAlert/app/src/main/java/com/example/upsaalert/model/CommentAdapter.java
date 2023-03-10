package com.example.upsaalert.model;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.upsaalert.EventsActivity;
import com.example.upsaalert.R;
import com.mikhaellopez.circularimageview.CircularImageView;
import com.squareup.picasso.Picasso;

import java.util.List;

public class CommentAdapter extends RecyclerView.Adapter<CommentAdapter.ViewHolder> {
    private List<Comments> listItems;
    private Context context;

    public CommentAdapter(List<Comments> listItems, Context context) {
        this.listItems = listItems;
        this.context = context;
    }
    @NonNull
    @Override
    public CommentAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(viewGroup.getContext())
                .inflate(R.layout.vieweventitem, viewGroup, false);
        return new CommentAdapter.ViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull final CommentAdapter.ViewHolder viewHolder, int position) {
        final Comments listItem = listItems.get(position);
        viewHolder.unames.setText(listItem.getFullname());
        viewHolder.ucomentx.setText(listItem.getCmsg());
        viewHolder.datssub.setText(listItem.getCommentdate());
        if (listItem.getImages().equals("default")){

        }else{
            Picasso.with(context)
                    .load(listItem.getImages())
                    .into(viewHolder.imgs);
        }

    }

    @Override
    public int getItemCount() {
        return listItems.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        public TextView unames;
        public TextView ucomentx;
        public TextView datssub;
        public CircularImageView imgs;




        public ViewHolder(View itemView) {
            super(itemView);

            unames = (TextView) itemView.findViewById(R.id.uuname);
            ucomentx = (TextView) itemView.findViewById(R.id.uucomt);
            datssub = (TextView) itemView.findViewById(R.id.uudate);
            imgs = (CircularImageView) itemView.findViewById(R.id.comimg);

        }
    }
}
